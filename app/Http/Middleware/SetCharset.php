<?php

namespace App\Http\Middleware;

use Closure;

class SetCharset
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $contentType = $response->headers->get('Content-Type');
        if (strpos($contentType, 'text/html') !== false) {
            $response->header('Content-Type', 'text/html; charset=UTF-8');
        }

        return $response;
    }
}
