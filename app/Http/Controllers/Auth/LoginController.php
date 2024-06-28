<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            "eamil.email" => 'Format email incorrect',
            "password.required" => 'Champ obligatoire'
        ]);

      
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            
            if (auth()->user()->type->name == 'admin') {
                return redirect()->route('admin.home')->with('success', 'Bienvenue L\'espace Administrateur du GECAP');
            }else if (auth()->user()->type->name == 'manager') {
                return redirect()->route('manager.home')->with('success', 'Bienvenue L\'espace CAP du GECAP'); 

            }else if (auth()->user()->type->name == "user")
            {
                return redirect()->route('user.home')->with('success', 'Bienvenue L\'espace Ecole du GECAP');
            }
        }else{
            return Redirect()->route('auth.login')
                ->with('error','Email ou mot de passe incorrect.');
        }

    }
}
