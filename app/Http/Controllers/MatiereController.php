<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $matieres = Matiere::all();
        return view('matieres.listes', compact('matieres'));
    }
    public function create()
    {
        return view('matieres.ajout');
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $matiere = new Matiere();
        $matiere->libelle = $request->libelle;
        $matiere->type = $request->type;
        $matiere->save();
        return redirect()->route('matieres.listes')->with('success', 'Enregistrement effectué avec succès');
    }
    
    public function edit($id)
    {
        
        $matiere = Matiere::find($id);
        return view('enseignants.edit', compact('matiere'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matiere = matiere::find($id);
        
    }
    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matiere = Matiere::find($id);
        $matiere->libelle = $request->libelle;
        $matiere->type = $request->type;
       
        $matiere->save();
        return redirect()->route('matieres.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = Matiere::find($id);
        $matiere->delete();
        return redirect()->route('matieres.listes')->with('danger', 'suppression effectuée avec succèsx');
    }
}
