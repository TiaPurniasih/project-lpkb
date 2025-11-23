<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleLevelMiddleware
{
    public function handle($request, Closure $next, int $levelRequired)
    {
        if (!$request->user() || !$request->user()->hasLevel($levelRequired)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
