<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::paginate(10);
        return view('eleves.listes', compact('eleves'));
    }
    public function create()
    {
        $ecoles = Ecole::all();
        return view('eleves.ajout', compact('ecoles'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eleve = new Eleve;
        $eleve->ecole_id = $request->ecole_id; 
        $eleve->matricule = $request->matricule;
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->date_n = $request->date_n;
        $eleve->adresse = $request->adresse;
        $eleve->genre = $request->genre;
    
        
        if ($request->hasFile('acte_n')) {
            $file = $request->file('acte_n');
            
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png']; // Ajoutez les extensions autorisées
            $extension = $file->getClientOriginalExtension();
            
            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Le type de fichier n\'est pas autorisé.');
            }
    
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('actes_naissance'), $fileName);
    
            $eleve->acte_n = $fileName;
        }
    
        $eleve->save();
        return redirect()->route('eleves.listes')->with('worning', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $eleve = Eleve::find($id);
        return view('eleves.edit', compact('eleve'));
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
        $eleve = Eleve::find($id);
        $eleve->ecole_id = $request->ecole_id;
        $eleve->matricule = $request->matricule;
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->date_n = $request->date_n;
        $eleve->adresse = $request->adresse;
        $eleve->genre = $request->genre;
        if ($request->hasFile('acte_n')) {
            $file = $request->file('acte_n');
            // Stocker le contenu du fichier PDF dans la colonne 'cv' comme un flux binaire
            $eleve->cv = file_get_contents($file->getRealPath());
        }
    
        $eleve->save();
        return redirect()->route('eleves.listes')->with('worning', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->delete();
        return redirect()->route('eleves.listes')->with('danger', 'suppression effectuée');
    }
    public function telechargerPdf($id)
    {
        $eleve = Eleve::find($id);
        if (!$eleve || !$eleve->cv) {
            abort(404);
        }
    
        $pdfContent = $eleve->cv;
        $fileName = 'cv_' . $eleve->nom . '_' . $eleve->prenom . '.pdf';
    
        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, $fileName);
    }
}
