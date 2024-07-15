<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginEnseignantController extends Controller
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

       


        if (Auth::guard('enseignant')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (Auth::guard('enseignant')->user()->type->name == 'enseignant') {
                return redirect()->route('enseignant.home')->with('success', 'Bienvenue sur votre espace de travail du GECAP');
            } else {
                Auth::guard('enseignant')->logout();
                return redirect()->route('auth.enseignant.login')->with('error', 'Type non correspondant.');
            }
        } else {
            return redirect()->route('auth.enseignant.login')->with('error', 'Email ou mot de passe incorrect !!');
        }
    }
}
