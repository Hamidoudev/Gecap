<?php

namespace App\Http\Controllers;

use App\Models\Emplois;
use Illuminate\Http\Request;

class EmploisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = Emplois::paginate(10);
        return view('emplois.listes', compact('emplois'));
    }
    public function create()
    {
        return view('emplois.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emploi = new Emplois();
        $emploi->ue = $request->ue;
        $emploi->trimestre = $request->trimestre;
        $emploi->date_debut = $request->date_debut;
        $emploi->date_fin = $request->date_fin;
        $emploi->save();
        return redirect()->route('emplois.listes')->with('worning', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $enseignant = Emplois::find($id);
        return view('emplois.edit', compact('emploi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $emploi = Emplois::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $emploi = Emplois::find($id);
        $emploi->ue = $request->ue;
        $emploi->trimestre = $request->trimestre;
        $emploi->date_debut = $request->date_debut;
        $emploi->date_fin = $request->date_fin;
        $emploi->save();
        return redirect()->route('emplois.listes')->with('worning', 'modication effectuée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emploi = Emplois::find($id);
        $emploi->delete();
        return redirect()->route('emplois.listes')->with('danger', 'suppression effectuée');
    }
}
