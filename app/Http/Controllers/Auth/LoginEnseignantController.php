<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            "eamil.email" => 'Format email incorrect',
            "password.required" => 'Champ obligatoire'
        ]);

        $enseignant = Enseignant::where('email', $request->email)->first();

        if (!$enseignant){
            toastr()->error('Email non valide.');
            return redirect()->back();
        }

        if(!password_verify($request->password, $enseignant->password))
        {
            toastr()->error('Mot de passe incorrect.');
            return redirect()->back();

        }

        if($enseignant->type->name != 'enseignant')
        {
            toastr()->error('Type non correspondant.');
            return redirect()->back();

        }

        Auth::login($enseignant);

        $request->session()->put('id', $enseignant->id);
        $request->session()->put('nom', $enseignant->nom);
        $request->session()->put('type', $enseignant->type->name);
        $request->session()->put('prenom', $enseignant->prenom);


                return redirect()->route('enseignant.home')->with('success',  'Bienvenue'. ' ' .$enseignant->prenom . ' '.$enseignant->nom .' sur votre espace enseignant du GECAP');
            


    }
}
