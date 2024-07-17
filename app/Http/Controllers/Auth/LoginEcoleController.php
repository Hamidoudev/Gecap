<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ecole;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginEcoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            "email.required" => 'Champ obligatoire',
            "email.email" => 'Format email incorrect',
            "password.required" => 'Champ obligatoire'
        ]);

   

       
        if (Auth::guard('ecole')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (Auth::guard('ecole')->user()->type->name == 'ecole') {
                return redirect()->route('ecole.home')->with('success', 'Bienvenue sur votre espace de travail du GECAP');
            } else {
                Auth::guard('ecole')->logout();
                return redirect()->route('auth.ecole.login')->with('error', 'Type non correspondant.');
            }
        } else {
            return redirect()->route('auth.ecole.login')->with('error', 'Email ou mot de passe incorrect !!');
        }
    }
}
