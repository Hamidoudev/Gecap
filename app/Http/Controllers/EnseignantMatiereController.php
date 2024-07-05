<?php

namespace App\Http\Controllers;

use App\Models\EnseignanMatiere;
use App\Models\Enseignant;
use App\Models\EnseignantMatiere;
use App\Models\Matiere;
use Illuminate\Http\Request;

class EnseignantMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        $matieres = Matiere::all(); 
        $enseignant_matieres = EnseignantMatiere::paginate(10);
        return view('pages.ecole.affectation.listes', compact('enseignant_matieres','matieres','enseignants'));
    }
    public function create()
    {
        $matieres = Matiere::all();
        $enseignants = Enseignant::all();
        return view('pages.ecole.affectation.ajout', compact('matieres', 'enseignants'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eleve = new EnseignantMatiere() ;
        $eleve->enseignant_id = $request->enseignant_id; 
        $eleve->matiere_id = $request->matiere_id; 
        $eleve->save();
        return redirect()->route('pages.ecole.affectation.listes')->with('success', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $matieres = Matiere::all();
        $enseignants = Enseignant::all();
        $enseignant_matiere = EnseignantMatiere::find($id);
        return view('pages.ecole.affectation.edit', compact('enseignant_matiere', 'matieres','enseignants'));
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
        $enseignant_matiere = EnseignantMatiere::find($id);
        $enseignant_matiere->enseignant_id = $request->enseignant_id; 
        $enseignant_matiere->matiere_id = $request->matiere_id; 
        $enseignant_matiere->save();
        return redirect()->route('pages.ecole.affectation.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enseignant_matiere = EnseignantMatiere::find($id);
        $enseignant_matiere->delete();
        return redirect()->route('pages.ecole.affectation.listes')->with('danger', 'suppression effectuée avec succès');
    }
   
}
