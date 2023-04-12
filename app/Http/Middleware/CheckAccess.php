<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{

    public function handle(Request $request, Closure $next,$access): Response
    {
        $akses = auth()->user()->has_permissions->contains($access);
        if($akses===false && !auth()->user()->is_admin()){
            abort(401);
        }
        return $next($request);
    }
}
