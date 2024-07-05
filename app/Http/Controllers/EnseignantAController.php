<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class EnseignantAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        $matieres = Matiere::all();
        $enseignants = Enseignant::paginate(10);
        return view('enseignants.listes', compact('enseignants','matieres','ecoles'));
    }
    public function create()
    {
        $matieres = Matiere::all();
        return view('enseignants.ajout', compact('matieres'));    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $enseignant = new Enseignant();
        $enseignant->ecole_id = $request->ecole_id;
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;
        
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
            $file->move(public_path('mes_cv'), $fileName);
    
            // Stockage du nom du fichier dans la base de données
            $enseignant->cv = $fileName;
        }
    
        $enseignant->save();
        $enseignant->matieres()->attach($request->matieres);
        return redirect()->route('enseignants.listes')->with('success', 'Enregistrement effectué avec succès');
    }
    
    public function edit($id)
    {
        $enseignant = Enseignant::find($id);
        $matieres = Matiere::all();
        return view('enseignants.edit', compact('enseignant', 'matieres'));
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
        $enseignant->ecole_id = $request->ecole_id;
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
        $enseignant->matieres()->sync($request->matieres);
        return redirect()->route('enseignants.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->delete();
        return redirect()->route('enseignants.listes')->with('danger', 'suppression effectuée avec succèsx');
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
