<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
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
            $this->validateDomainToken();

            JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'El token no es válido'], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'status' => 'El token ha caducado',
                    'message' => 'Utiliza el endpoint auth/refresh enviando el refresh token como Bearer token.'
                ], 401);
            } else if ($e->getCode() == 403) {
                return response()->json(['status' => $e->getMessage()], 403);
            } else {
                return response()->json(['status' => 'Token de autorización no encontrado'], 401);
            }
        }
        return $next($request);
    }

    protected function validateDomainToken()
    {
        $tenantIdFromToken = JWTAuth::parseToken()->payload()->get('tenant_id');

        if ($tenantIdFromToken != tenant('id')) {
            throw new Exception('El Token no pertenece al dominio', 403);
        }
    }
}
