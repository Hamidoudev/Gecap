<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            "eamil.email" => 'Format email incorrect',
            "password.required" => 'Champ obligatoire'
        ]);

        $ecole = Ecole::where('email', $request->email)->first();

        if (!$ecole){
            toastr()->error('Email non valide.');
            return redirect()->back();
        }

        if(!password_verify($request->password, $ecole->password))
        {
            toastr()->error('Mot de passe incorrect.');
            return redirect()->back();

        }

        if($ecole->type->name != 'ecole')
        {
            toastr()->error('Type non correspondant.');
            return redirect()->back();

        }

        Auth::login($ecole);

        $request->session()->put('id', $ecole->id);
        $request->session()->put('nom', $ecole->nom);
        $request->session()->put('type', $ecole->type->name);
        $request->session()->put('email', $ecole->email);


                return redirect()->route('ecole.home')->with('success',  'Bienvenue'. ' ' .$ecole->nom . ' ' .' sur votre espace Ecole du GECAP');
            


    }
}
