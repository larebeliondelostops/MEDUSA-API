<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            //dd($request);
            // Verficar si existe un token en el header
            //$token = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $request->header('Authorization'));

            if (!$token) {
                return response()->json(['message' => 'No se proporcionó un token'], 401);
            }

            // Set del token para trabajar con el mismo
            JWTAuth::setToken($token);

            // Verificar que el usuario con este token exista en la base de datos
            $user = JWTAuth::authenticate();
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado'], 500);
            }
        } catch (TokenExpiredException $e) {
            // Si el token ha expirado, retorna tu propia respuesta personalizada
            return response()->json([
                'message' => 'El token ha expirado.',
            ], 401);
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return $next($request);
    }
}
