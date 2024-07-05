<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        
        if(Auth::user()->type->name === $userType){
            return $next($request);
        }

        toastr()->info('Vous n\'avez pas le droit d\'accéder à ces ressources!!');
        return redirect('/');

        // return response()->json(['Vous n\'êtes pas permis à accéder à cette.']);
        /* return response()->view('errors.check-permission'); */
    }
}
