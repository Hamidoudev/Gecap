<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Ecole;
use App\Mail\EcoleMail;
use App\Models\typeEcole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserNotification;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        $typeecoles = typeEcole::all(); 
        $ecoles = Ecole::paginate(10);
        return view('ecoles.listes', compact('ecoles', 'typeecoles','types'));
    }
    public function create()
    {
        $typeecoles = typeEcole::all();
        return view('ecoles.ajout', compact('typeecoles'));
    }
      


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = $request->password;
        $ecole = new Ecole;
        $ecole->typeecole_id = $request->typeecole_id; 
        $ecole->type_id = 4; 
        $ecole->nom = $request->nom;
        $ecole->siege = $request->siege;
        $ecole->email = $request->email;
        $ecole->password =Hash::make($request->password);
        $ecole->save();
        $data = [
            'nom' => $request->nom,
            'email' => $request->email,
            'siege' => $request->siege,
            'password' => $password
        ];
        Mail::to($request->email)
                        ->queue(new EcoleMail($data));
        return redirect()->route('ecoles.listes')->with('success', 'enregistrement effectuée'); 
    }
    
    public function sendNotification()
    {
        $user = User::find(1); // Trouver un utilisateur par ID

        $details = [
            'message' => 'Vous avez une nouvelle notification!',
            'url' => url('/notifications')
        ];

        $user->notify(new UserNotification($details));

        return response()->json(['message' => 'Notification envoyée avec succès!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ecole = Ecole::find($id);
        $ecole->typeecole_id = $request->typeecole_id; 
        $ecole->type_id = 4; 
        $ecole->nom = $request->nom;
        $ecole->siege = $request->siege;
        $ecole->email = $request->email;
        $ecole->password = $request->password;
    
        $ecole->save();
        return redirect()->route('ecoles.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ecole = Ecole::find($id);
        $ecole->delete();
        return redirect()->route('ecoles.listes')->with('danger', 'suppression effectuée avec succès');
    }
}
