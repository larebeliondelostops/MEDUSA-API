<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Request\Auth\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Request\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Controlador Maneja Lógica de Auth.
 *
 * Controlador que maneja la lógica de la autenticación de los usuarios en el sistema
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class AuthController extends Controller
{
    /**
     * Variable para manejar la información contenida en las respuestas
     *
     * @access protected
     * @var object
     */
    protected $data;

    /**
     * Variable para manejar el mensaje contenido en las respuestas
     *
     * @access protected
     * @var object
     */
    protected $message;

    /**
     * Variable para manejar el estado de la petición contenido en las respuestas
     *
     * @access protected
     * @var object
     */
    protected $status_code;

    /**
     * Método para dar respuesta a los métodos invocados dentro de la clase
     *
     * @access public
     * @return Illuminate\Support\Facades\Response
     */
    public function sendResponse()
    {
        return Response::json([
            'data' => $this->data,
            'message' => $this->message
        ], $this->status_code ?? 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Método para realizar el registro en el sistema de un usuario
     *
     * @access public
     * @param RegisterRequest
     * @return Illuminate\Support\Facades\Response
     */
    public function register(RegisterRequest $request)
    {
        // Validación
        if (isset($request->validator) && $request->validator->fails()) {
            return Response::json([
                'code' => '2001',
                'status' => 'error',
                'message' => 'Datos Recibidos Incorrectos',
                'errors' => $request->validator->messages()
            ], 400, [], JSON_PRETTY_PRINT);
        }

        $input = $request->only('name', 'email', 'password', 'password_confirmation');

        $input['password'] = bcrypt($input['password']); // use bcrypt to hash the passwords
        $user = User::create($input); // eloquent creation of data

        $success['user'] = $user;

        $this->data = $success;
        $this->message = 'Usuario registrado exitosamente';
        $this->status_code = 201;

        return $this->sendResponse();

    }

    public function loginGoogle(Request $request)
    {
        try {
            
            $rules = [
                'username' => [
                    'required',
                ],
                'email' => [
                    'required'
                ]
            ];
            $messages = [
                'required' => 'El campo :attribute es obligatorio',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $validar_correo = User::where('email', $request->email)->first();
            //dd($request->only('username', 'email'));
            if (isset($validar_correo)) {
                $keys = ['email' => $request->email, 'password' => 1123456789];
                
                $token = JWTAuth::claims(['tenant_id' => tenant('id'), 'exp' => time() + (180 * 60)])->attempt($keys);
                //dd($token);
                //dd(JWTAuth::setToken($token)->getPayload(), intval((JWTAuth::setToken($token)->getPayload()->get('exp') - time()) / 60));
                //$user = auth()->setToken('xd.xd.Xd')->user();
            } else {
                // Crear el usuario
                $user = new User();
                $user->name = $request->username;
                $user->email = $request->email;
                $user->password = bcrypt(1123456789);
                $user->save();
                $user->assignRole(2);
                $keys = ['email' => $request->email, 'password' => 1123456789];
                
                $token = JWTAuth::claims(['tenant_id' => tenant('id'), 'exp' => time() + (180 * 60)])->attempt($keys);
            }


            $user = Auth::user();

            $success = [
                'accessToken' => $token,
                'name' => $user->name,
                'email' => $user->email,
                'roleName' => $user->getRoleNames()[0] ?? null,
                'id' => $user->id
            ];
    
            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente',
                'data' => $success
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para realizar el registro en el sistema de un usuario
     *
     * @access public
     * @param LoginRequest
     * @return Illuminate\Support\Facades\Response
     */
    public function login(LoginRequest $request)
    {
        // Validación
        if (isset($request->validator) && $request->validator->fails()) {
            return Response::json([
                'code' => '2001',
                'status' => 'error',
                'message' => 'Datos Recibidos Incorrectos',
                'errors' => $request->validator->messages()
            ], 400, [], JSON_PRETTY_PRINT);
        }

        $input = $request->only('email', 'password');

        $remember = $request->filled('remember') ?? false;

        try {
            // this authenticates the user details with the database and generates a token
            if (! $token = JWTAuth::claims(['tenant_id' => tenant('id')])->attempt($input)) {

                $this->data = [];
                $this->message = 'La contraseña es incorrecta';
                $this->status_code = 400;

                return $this->sendResponse();
            }

            if ($remember) {
                // Crear el refresh token
                $refresh_token = auth()->setTTL(7200)->attempt($input);
            } else {
                $refresh_token = auth()->setTTL(540)->attempt($input);
            }

            $user = Auth::user();

            $success = [
                'accessToken' => $token,
                'refreshToken' => $refresh_token,
                'name' => $user->name,
                'email' => $user->email,
                /*'phoneNumber' => $user->phone_number,
                'adress' => $user->adress, */
                //'avatar' => $user->avatar == NULL ? '/storage/avatar/default.jpg' : tenant('id') . '/avatar/' . $user->avatar,
                'roleName' => $user->getRoleNames()[0] ?? null,
                'id' => $user->id
            ];

            $this->data = $success;
            $this->message = 'Inicio aprovado';
            $this->status_code = 200;

            return $this->sendResponse();
        } catch (JWTException $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function loginGoogle(Request $request)
    {
        try {
            
            $rules = [
                'username' => [
                    'required',
                ],
                'email' => [
                    'required'
                ]
            ];
            $messages = [
                'required' => 'El campo :attribute es obligatorio',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $validar_correo = User::where('email', $request->email)->first();

            if (isset($validar_correo)) {

                $token = auth()->claims(['tenant_id' => tenant('id'), 'exp' => time() + (180 * 60)])->login($validar_correo);
                
            } else {
                // Crear el usuario
                $user = new User();
                $user->name = $request->username;
                $user->email = $request->email;
                $user->password = bcrypt(1123456789);
                $user->save();
                $user->assignRole(2);
                $keys = ['email' => $request->email, 'password' => 1123456789];
                
                $token = JWTAuth::claims(['tenant_id' => tenant('id'), 'exp' => time() + (180 * 60)])->attempt($keys);
            }


            $user = Auth::user();

            $success = [
                'accessToken' => $token,
                'name' => $user->name,
                'email' => $user->email,
                'roleName' => $user->getRoleNames()[0] ?? null,
                'id' => $user->id
            ];
    
            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente',
                'data' => $success
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para realizar el registro en el sistema de un usuario
     *
     * @access public
     * @param LoginRequest
     * @return Illuminate\Support\Facades\Response
     */
    public function getUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {

                $this->data = [];
                $this->message = 'Usuario no encontrado';
                $this->status_code = 403;

                return $this->sendResponse();
            }
            $user->getRoleNames();
            $this->data = $user;
            $this->message = 'Informacion del usuario';
            $this->status_code = 200;

            return $this->sendResponse();
        } catch (JWTException $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return Response::json([
            'status' => 'success',
            'message' => 'Petición exitosa',
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateToken(Request $request)
    {
        // Recuperación del token
        //$token = $request->header('Authorization');
        $token = str_replace('Bearer ', '', $request->header('Authorization'));

        // Setear el token para trabajar con él
        $jwtAuth = JWTAuth::setToken($token);

        try {
            if (JWTAuth::check()) {

                // Extraemos el tiempo de expiración del token en formato UNIX
                $expiration = $jwtAuth->getPayload()->get('exp');
                $currentTimestamp = time();

                return Response::json([
                    'status' => 'success',
                    'message' => 'Token Vigente',
                    'duration' => intval(($expiration - $currentTimestamp) / 60) . ' Minutos',
                ], 200, [], JSON_PRETTY_PRINT);
            } else {

                return Response::json([
                    'status' => 'error',
                    'message' => 'Token Expirado'
                ], 500, [], JSON_PRETTY_PRINT);
            }
        } catch (JWTException $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Refresh de los token's.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request)
    {
        try {
            //$token = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $request->header('Authorization'));
            // Setear el token para trabajar con él
            $jwtAuth = JWTAuth::setToken($token);

            // Obtener el token actual en una variable
            $currentToken = JWTAuth::getToken();

            // Invoación del modelo asociado al token
            $user = $jwtAuth->authenticate();

            // Almacenar el tiempo actual en un formato entendible para el JWT
            $currentTimestamp = time();

            // Generar un nuevo access token para el usuario
            $newAccessToken = JWTAuth::fromUser($user, ['exp' => time() + (15 * 60)]);

            // Setear el token para trabajar con él
            $access_token = JWTAuth::setToken($newAccessToken);

            // Extraer la expiración del token
            $expiration_at = $access_token->getPayload()->get('exp');

            // Setear el token para trabajar con él
            $refresh_token = JWTAuth::setToken($currentToken);

            // Extraer la expiración del token
            $expiration_rt = $refresh_token->getPayload()->get('exp');

            return response()->json([
                'accessToken' => $newAccessToken,
                'refreshToken' => $token,
                'expirationAT' => intval(($expiration_at - $currentTimestamp) / 60) . ' Minutos',
                'expirationRT' => intval(($expiration_rt - $currentTimestamp) / 60) . ' Minutos',
            ]);
        } catch (JWTException $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}