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
        $personneladmin->genre = $request->genre;
        $personneladmin->poste = $request->poste;
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            
            // Vérification du type de fichier (extension)
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png']; // Ajoutez les extensions autorisées
            $extension = $file->getClientOriginalExtension();
            
            if (!in_array($extension, $allowedExtensions)) {
                // Redirection avec un message d'erreur si le type de fichier n'est pas autorisé
                return redirect()->back()->with('error', 'Le type de fichier n\'est pas autorisé.');
            }
    
            // Enregistrement du fichier dans un dossier spécifique
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('personnel_admin'), $fileName);
    
            // Stockage du nom du fichier dans la base de données
            $personneladmin->cv = $fileName;
        }
    
        $personneladmin->save();
        return redirect()->route('personnels.listes')->with('success', 'enregistrement effectuée avec succès'); 
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
        $personneladmin->genre = $request->genre;
        $personneladmin->poste = $request->poste;

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            
            // Vérification du type de fichier (extension)
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png']; // Ajoutez les extensions autorisées
            $extension = $file->getClientOriginalExtension();
            
            if (!in_array($extension, $allowedExtensions)) {
                // Redirection avec un message d'erreur si le type de fichier n'est pas autorisé
                return redirect()->back()->with('error', 'Le type de fichier n\'est pas autorisé.');
            }
    
            // Enregistrement du fichier dans un dossier spécifique
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('personnel_admin'), $fileName);
    
            // Stockage du nom du fichier dans la base de données
            $personneladmin->cv = $fileName;
        }
        
        $personneladmin->save();
        return redirect()->route('personnels.listes')->with('success', 'modification effectué avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personneladmin = Personneladmin::find($id);
        $personneladmin->delete();
        return redirect()->route('personnels.listes')->with('danger', 'suppression effectuée avec succès');
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
