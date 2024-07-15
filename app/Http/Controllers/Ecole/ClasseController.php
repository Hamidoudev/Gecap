<?php

namespace App\Http\Controllers\Ecole;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Cycle;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $cycles = Cycle::all();
        $classes = Classe::all();
        return view('pages.ecole.classe.listes', compact('classes', 'cycles'));
    }
    public function create()
    {
        
        $cycles = Cycle::all();
        return view('pages.ecole.classe.ajout', compact('cycles'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $classe = new Classe();
        $classe->libelle = $request->libelle;
        $classe->cycle_id = $request->cycle_id;
        $classe->save();
        return redirect()->route('pages.ecole.classe.listes')->with('success', 'Enregistrement effectué avec succès');
    }
    
    public function edit($id)
    {
        $cycles = Cycle::find($id);
        $classe = Classe::find($id);
        return view('pages.ecole.classe.edit', compact('classes', 'cycle'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classe = Classe::find($id);
        
    }
    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cycles = Cycle::find($id);
        $classe = Classe::find($id);
        $classe->libelle = $request->libelle;
        $classe->cycle_id = $request->cycle_id;
        
       
        $classe->save();
        return redirect()->route('pages.ecole.classe.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classe = Classe::find($id);
        $classe->delete();
        return redirect()->route('pages.ecole.classe.listes')->with('danger', 'suppression effectuée avec succèsx');
    }
}
