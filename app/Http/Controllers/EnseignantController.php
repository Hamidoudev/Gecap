<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::paginate(10);
        return view('enseignants.listes', compact('enseignants'));
    }
    public function create()
    {
        return view('enseignants.ajout');
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enseignant = new Enseignant();
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;
        
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileContent = file_get_contents($file->getRealPath());
            $enseignant->acte_n = $fileContent;
        }
        //if ($request->hasFile('cv')) {
           // $cv = $request->file('cv');
           // $enseignant->cv = $request->cv;
            
        //} else {
         //   $enseignant->cv = ''; // ou NULL, selon le type de la colonne dans votre base de données
       // }
        
        $enseignant->save();
        return redirect()->route('enseignants.listes')->with('warning', 'Enregistrement effectué');
    }
    
    public function edit($id)
    {
        $enseignant = Enseignant::find($id);
        return view('enseignants.edit', compact('enseignant'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enseignant = Enseignant::find($id);
        
    }
    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $enseignant->cv = file_get_contents($file->getRealPath());
        }
        
        $enseignant->save();
        return redirect()->route('enseignants.listes')->with('worning', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->delete();
        return redirect()->route('enseignants.listes')->with('danger', 'suppression effectuée');
    }
    public function telechargerPdf($id)
{
    $enseignant = Enseignant::find($id);
    if (!$enseignant || !$enseignant->cv) {
        abort(404);
    }

    $pdfContent = $enseignant->cv;
    $fileName = 'cv_' . $enseignant->nom . '_' . $enseignant->prenom . '.pdf';

    return response()->streamDownload(function () use ($pdfContent) {
        echo $pdfContent;
    }, $fileName);
}
}
