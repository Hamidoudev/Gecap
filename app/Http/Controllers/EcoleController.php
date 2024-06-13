<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\typeEcole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use App\Notifications\UserNotification;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeecoles = typeEcole::all(); 
        $ecoles = Ecole::paginate(10);
        return view('ecoles.listes', ['typeecoles' => $typeecoles], compact('ecoles'));
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
        $ecole = new Ecole;
        $ecole->typeecole_id = $request->typeecole_id; 
        $ecole->nom = $request->nom;
        $ecole->siege = $request->siege;
        $ecole->email = $request->email;
    
        $ecole->save();
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
        $ecole->nom = $request->nom;
        $ecole->siege = $request->siege;
        $ecole->email = $request->email;
    
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
