<?php

namespace App\Http\Controllers\Ecole;

use App\Models\Ecole;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        $classes = Classe::all();
        $matieres = Matiere::all();
        $ecoleId = Auth::guard('ecole')->user()->id; 
        $programmes = Programme::where('ecole_id', $ecoleId)->get();
        return view('pages.ecole.programmes.listes', compact('programmes','ecoles','classes','matieres'));
    }

    public function create()
    {
        $ecoles = Ecole::all();
        return view('pages.ecole.programmes.ajout', compact('ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $programme = new Programme();
        $programme->ecole_id = Auth::guard('ecole')->user()->id;
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('pages.ecole.programmes.listes')->with('success', 'enregistrement effectuée avec succès'); 
    }

    public function edit($id)
    {
        $ecoles = Ecole::all();
        $programme = Programme::find($id);
        return view('pages.ecole.programmes.edit', compact('programme', 'ecoles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programme = Programme::with(['ecole', 'classe', 'matiere'])->findOrFail($id);
        return view('pages.ecole.programmes.show', compact('programme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $programme = Programme::find($id);
        $programme->ecole_id =session()->get('id');;
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('pages.ecole.programmes.listes')->with('success', 'modification effectuée avec succès');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programme = Programme::find($id);
        $programme->delete();
        return redirect()->route('pages.ecole.programmes.listes')->with('danger', 'suppression effectuée avec succès');
    }
}
