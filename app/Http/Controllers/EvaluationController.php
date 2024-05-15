<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluation::paginate(10);
        return view('evaluations.listes', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evalaution = new Evaluation();
        $evalaution->matricule = $request->matricule;
        $evalaution->nom = $request->nom;
     
        $evalaution->save();
        return redirect()->route('evalautions.listes')->with('warning', 'Enregistrement effectué');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
