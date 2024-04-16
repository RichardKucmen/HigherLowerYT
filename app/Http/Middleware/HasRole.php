<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles=null): Response
    {
        $user = $request->user();
        if($user == null){
            abort("401");
        } if($user->isAdmin()){
            return $next($request);
        }
        abort(403);
    }
}
