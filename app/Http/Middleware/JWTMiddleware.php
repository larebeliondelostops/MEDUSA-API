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

            // Verficar si existe un token en el header
            $token = $request->header('Authorization');
            if (!$token) {
                return response()->json(['message' => 'No se proporcionó un token'], 401);
            }

            // Verificar si el token ha expirado
            /* dd(JWTAuth::check(substr($token, 7)));
            if (!JWTAuth::check(substr($token, 7))) {
                throw new TokenExpiredException('Token expirado');
            } */

            // Verificar que el usuario con este token exista en la base de datos
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado'], 500);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return $next($request);
    }
}