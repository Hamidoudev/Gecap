<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Ecole;
use App\Models\Matiere;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        $classes = Classe::all();
        $matieres = Matiere::all();
        $programmes = Programme::paginate(20);
        return view('programmes.listes', compact('programmes', 'classes','matieres','ecoles'));
    }

    public function create()
    {
        $ecoles = Ecole::all();
        $classes = Classe::all();
        $matieres = Matiere::all();
        return view('programmes.ajout', compact('ecoles', 'classes', 'matieres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ecole_id' => 'required|exists:ecoles,id',
            'classe_id' => 'required|exists:classes,id',
            'matiere_id' => 'required|exists:matieres,id',
            'theme' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        Programme::create($validatedData);
        return redirect()->route('programmes.listes')->with('success', 'Programme ajouté avec succès.');
    }

    public function edit($id)
    {
        $programme = Programme::findOrFail($id);
        $ecoles = Ecole::all();
        $classes = Classe::all();
        $matieres = Matiere::all();
        return view('programmes.edit', compact('programme', 'ecoles', 'classes', 'matieres'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ecole_id' => 'sometimes|exists:ecoles,id',
            'classe_id' => 'sometimes|exists:classes,id',
            'matiere_id' => 'sometimes|exists:matieres,id',
            'theme' => 'required|string|max:255',
            'contenu' => 'required|string'
        ]);

        $programme = Programme::findOrFail($id);
        $programme->update($validatedData);
        return redirect()->route('programmes.listes')->with('success', 'Programme mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $programme = Programme::findOrFail($id);
        $programme->delete();
        return redirect()->route('programmes.listes')->with('success', 'Programme supprimé avec succès.');
    }

    public function show(string $id)
    {
        $programme = Programme::with(['ecole', 'classe', 'matiere'])->findOrFail($id);
        return view('programmes.show', compact('programme'));
    }
}
