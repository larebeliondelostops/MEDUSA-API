<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder;

class SetTenantFromSubdomain
{
    protected $tenantFinder;

    public function __construct(TenantFinder $tenantFinder)
    {
        $this->tenantFinder = $tenantFinder;
    }

    public function handle(Request $request, Closure $next)
    {
        $subdomain = $this->getSubdomainFromRequest($request);
        dd($this->tenantFinder);
        // Use the tenant finder to get the tenant model based on the subdomain
        /* $tenant = $this->tenantFinder::findForRequest('domain', $subdomain)->first();
        $tenant->makeCurrent(); */

        // Set the current tenant
        //app('currentTenant')->set($tenant);

        return $next($request);
    }

    protected function getSubdomainFromRequest(Request $request)
    {
        $host = request()->getHost(); // Obtener el host completo de la solicitud

        $parsedUrl = parse_url($host);

        // Si el host se divide en partes y tiene al menos tres partes (sub.subdominio.dominio)
        if (isset($parsedUrl['path'])) {

            $parts = explode('.', $parsedUrl['path']);
            if (count($parts) >= 2) {
                // El subdominio es la primera parte del host
                return $parts[0];
            }
        }

        // Si no hay subdominio (solo dominio), devuelve null o lo que necesites
        return null;
    }
}
