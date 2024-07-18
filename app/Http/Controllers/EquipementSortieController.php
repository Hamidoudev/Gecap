<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Equipement;
use App\Models\EquipementSortie;
use Illuminate\Http\Request;

class EquipementSortieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipements = Ecole::all();
        $equipementsortie = EquipementSortie::paginate(10);
        return view('equipementsorties.listes', compact('equipements','equipementsortie'));
    }

    public function create()
    {
        $equipements = Equipement::all();
        return view('equipementsorties.ajout' , compact('equipements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipementsortie = new EquipementSortie();
       
        $equipementsortie->quantite = $request->quantite;
        $equipementsortie->date_entre = $request->date_sortie;
        $equipementsortie->equipement_id = $request->equipement_id;
        $equipementsortie->save();
        return redirect()->route('equipementsorties.listes')->with('success', 'Enregistrement effectué');
    }

    public function edit($id)
    {
        $equipementsortie = EquipementSortie::find($id);
        return view('equipementsorties.edit', compact('equipementsortie'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipementsortie = EquipementSortie::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipementsortie = EquipementSortie::find($id);
        $equipementsortie->quantite = $request->quantite;
        $equipementsortie->date_entre = $request->date_sortie;
        $equipementsortie->equipement_id = $request->equipement_id;
        $equipementsortie->save();
        return redirect()->route('equipementsorties.listes')->with('success', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipementsortie = EquipementSortie::find($id);
        $equipementsortie->delete();
        return redirect()->route('equipementsorties.listes')->with('danger', 'suppression effectuée');
    }
}