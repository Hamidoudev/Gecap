<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
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
        $programmes = Programme::paginate(10);
        return view('programmes.listes', compact('programmes','ecoles'));
    }

    public function create()
    {
        $ecoles = Ecole::all();
        return view('programmes.ajout', compact('ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $programme = new Programme();
        $programme->ecole_id = $request->ecole_id;
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('programmes.listes')->with('success', 'enregistrement effectuée avec succès'); 
    }

    public function edit($id)
    {
        $ecoles = Ecole::all();
        $programme = Programme::find($id);
        return view('programmes.edit', compact('programme', 'ecoles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programme = Programme::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $programme = Programme::find($id);
        $programme->ecole_id = $request->ecole_id;
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('programmes.listes')->with('success', 'modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programme = Programme::find($id);
        $programme->delete();
        return redirect()->route('programmes.listes')->with('danger', 'suppression effectuée avec succès');
    }
}
