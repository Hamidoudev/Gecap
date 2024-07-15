<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        $cycles = Cycle::all();
        $ecoleId = Auth::guard('ecole')->user()->id;  
        $matieres = Matiere::where('ecole_id', $ecoleId)->get();
        return view('pages.ecole.matieres.listes', compact('matieres', 'cycles','enseignants'));
    }
    public function create()
    {
        
        $enseignants = Enseignant::all();
        return view('pages.ecole.matieres.ajout', compact('enseignants'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $matiere = new Matiere();
        $matiere->libelle = $request->libelle;
        $matiere->cycle_id = $request->cycle_id;
        $matiere->ecole_id =Auth::guard('ecole')->user()->id;
        $matiere->save();
        if ($request->has('enseignants')) {
            $matiere->enseignants()->attach($request->enseignants);
        }
        return redirect()->route('pages.ecole.matieres.listes')->with('success', 'Enregistrement effectué avec succès');
    }
    
    public function edit($id)
    {
        $cycles = Cycle::find($id);
        $matiere = Matiere::find($id);
        return view('pages.ecole.matieres.edit', compact('matiere', 'cycle'));
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
        $cycles = Cycle::find($id);
        $matiere = Matiere::find($id);
        $matiere->libelle = $request->libelle;
        $matiere->cycle_id = $request->cycle_id;
        $matiere->ecole_id = Auth::guard('ecole')->user()->id;
        $matiere->save();
        if ($request->has('enseignants')) {
            $matiere->enseignants()->sync($request->input('enseignants'));
        }else {
            $matiere->enseignants()->detach();
        }
        return redirect()->route('pages.ecole.matieres.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = Matiere::find($id);
        $matiere->delete();
        return redirect()->route('pages.ecole.matieres.listes')->with('danger', 'suppression effectuée avec succèsx');
    }
}
