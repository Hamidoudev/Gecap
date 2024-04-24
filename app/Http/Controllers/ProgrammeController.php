<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = Programme::paginate(10);
        return view('programmes.listes', compact('programmes'));
    }

    public function create()
    {
        return view('programmes.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $programme = new Programme();
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('programmes.listes')->with('worning', 'enregistrement effectuée'); 
    }

    public function edit($id)
    {
        $programme = Programme::find($id);
        return view('programmes.edit', compact('programme'));
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
        $programme->libelle = $request->libelle;
        $programme->save();
        return redirect()->route('programmes.listes')->with('worning', 'modication effectuée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programme = Programme::find($id);
        $programme->delete();
        return redirect()->route('programmes.listes')->with('danger', 'suppression effectuée');
    }
}
