<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Deixa a CDN (Vercel) guardar as páginas públicas por 1 min, sem bater no banco a cada visita. */
class CachePublicPages
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethodCacheable() && $response->isSuccessful()) {
            $response->headers->set('Cache-Control', 'public, max-age=0, s-maxage=60, stale-while-revalidate=300');
        }

        return $response;
    }
}
