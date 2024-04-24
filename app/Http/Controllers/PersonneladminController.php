<?php

namespace App\Http\Controllers;

use App\Models\Personneladmin;
use Illuminate\Http\Request;

class PersonneladminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personneladmins = Personneladmin::paginate(10);
        return view('personnels.listes', compact('personneladmins'));
    }
    public function create()
    {
        return view('personnels.ajout');
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personneladmin = new Personneladmin();
        $personneladmin->matricule = $request->matricule;
        $personneladmin->nom = $request->nom;
        $personneladmin->prenom = $request->prenom;
        $personneladmin->date_n = $request->date_n;
        $personneladmin->email = $request->email;
        $personneladmin->telephone = $request->telephone;
        $personneladmin->adresse = $request->adresse;
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            // Stocker le contenu du fichier PDF dans la colonne 'cv' comme un flux binaire
            $personneladmin->cv = file_get_contents($file->getRealPath());
        }
        
        $personneladmin->save();
        return redirect()->route('personnels.listes')->with('worning', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $personneladmin = Personneladmin::find($id);
        return view('personnels.edit', compact('personneladmin'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personneladmin = Personneladmin::find($id);
        
    }
    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personneladmin = Personneladmin::find($id);
        $personneladmin->matricule = $request->matricule;
        $personneladmin->nom = $request->nom;
        $personneladmin->prenom = $request->prenom;
        $personneladmin->date_n = $request->date_n;
        $personneladmin->email = $request->email;
        $personneladmin->telephone = $request->telephone;
        $personneladmin->adresse = $request->adresse;
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $personneladmin->cv = file_get_contents($file->getRealPath());
        }
        
        $personneladmin->save();
        return redirect()->route('personnels.listes')->with('worning', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personneladmin = Personneladmin::find($id);
        $personneladmin->delete();
        return redirect()->route('personnels.listes')->with('danger', 'suppression effectuée');
    }
    public function telechargerPdf($id)
{
    $personneladmin = Personneladmin::find($id);
    if (!$personneladmin || !$personneladmin->cv) {
        abort(404);
    }

    $pdfContent = $personneladmin->cv;
    $fileName = 'cv_' . $personneladmin->nom . '_' . $personneladmin->prenom . '.pdf';

    return response()->streamDownload(function () use ($pdfContent) {
        echo $pdfContent;
    }, $fileName);
}
}
