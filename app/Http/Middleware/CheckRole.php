<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($role == 'admin' && auth()->user()->role_id != 1){
            return 'Pas le droit';
        }

        if($role == 'auteur' && auth()->user()->role_id != 2){
            return 'Pas le droit';
        }

        if($role == 'checker' && auth()->user()->role_id != 3){
            return 'Pas le droit';
        }

        return $next($request);
    }
}
