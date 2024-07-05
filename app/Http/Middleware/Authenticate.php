<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if(! $request->expectsJson())
        {
            if($request->routeIs('auth.ecole.login')){
                return route('auth.ecole.login');
            }
            if($request->routeIs('auth.enseignant.login')){
                return route('auth.enseignant.login');
            }
             // Redirige vers la même route
             return $request->url();
        }
    }
}

 // Redirige vers auth.login par défaut
 //return route('auth.login');

