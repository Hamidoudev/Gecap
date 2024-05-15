<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipements = Equipement::paginate(10);
        return view('equipements.listes', compact('equipements'));
    }

    public function create()
    {
        return view('equipements.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipement = new Equipement();
        $equipement->nom = $request->nom;
        $equipement->type = $request->type;
        $equipement->quantite = $request->quantite;
        $equipement->save();
        return redirect()->route('equipements.listes')->with('success', 'Enregistrement effectué');
    }

    public function edit($id)
    {
        $equipement = Equipement::find($id);
        return view('equipements.edit', compact('equipement'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipement = Equipement::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipement = Equipement::find($id);
        $equipement->nom = $request->nom;
        $equipement->type = $request->type;
        $equipement->quantite = $request->quantite;
        $equipement->save();
        return redirect()->route('equipements.listes')->with('success', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipement = Equipement::find($id);
        $equipement->delete();
        return redirect()->route('equipements.listes')->with('danger', 'suppression effectuée');
    }
}
