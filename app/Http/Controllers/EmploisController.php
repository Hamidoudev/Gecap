<?php

namespace App\Http\Controllers;

use App\Models\Emplois;
use App\Models\trimestre;
use App\Models\ue;
use Illuminate\Http\Request;

class EmploisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ues = ue::all();
        $trimestres = trimestre::all();
        $emplois = Emplois::with('ue', 'trimestre')->get();
        return view('emplois.listes', compact('emplois','ues','trimestres'));
    }
    public function create()
    {
        $ues = ue::all();
        $trimestres = trimestre::all();
        return view('emplois.ajout', compact('ues','trimestres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emploi = new Emplois();
        $emploi->ue_id = $request->ue_id;
        $emploi->trimestre_id = $request->trimestre_id;
        $emploi->date_debut = $request->date_debut;
        $emploi->date_fin = $request->date_fin;
        $emploi->save();
        return redirect()->route('emplois.listes')->with('success', 'enregistrement effectuée'); 
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
        $emploi->ue_id = $request->ue_id;
        $emploi->trimestre_id = $request->trimestre_id;
        $emploi->date_debut = $request->date_debut;
        $emploi->date_fin = $request->date_fin;
        $emploi->save();
        return redirect()->route('emplois.listes')->with('success', 'modication effectuée');
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
