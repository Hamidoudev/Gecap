<?php

namespace App\Http\Controllers;

use App\Models\Classe;
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
        $classes = Classe::all(); 
        $eleves = Eleve::paginate(10);
        return view('eleves.listes', ['classes' => $classes], compact('eleves'));
    }
    public function create()
    {
        $classes = Classe::all();
        return view('eleves.ajout', compact('classes'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eleve = new Eleve;
        $eleve->classe_id = $request->classe_id; 
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
        return redirect()->route('eleves.listes')->with('success', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $classes = Classe::all();
        $eleve = Eleve::find($id);
        return view('eleves.edit', compact('eleve', 'classes'));
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
        $eleve->classe_id = $request->classe_id;
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
        return redirect()->route('eleves.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->delete();
        return redirect()->route('eleves.listes')->with('danger', 'suppression effectuée avec succès');
    }
    public function telechargerPdf($id)
    {
        $eleve = Eleve::find($id);
        if (!$eleve || !$eleve->acte_n) {
            abort(404);
        }
    
        $pdfContent = $eleve->acte_n;
        $fileName = 'cv_' . $eleve->nom . '_' . $eleve->prenom . '.pdf';
    
        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, $fileName);
    }
}
