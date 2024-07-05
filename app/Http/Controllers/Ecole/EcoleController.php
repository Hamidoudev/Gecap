<?php

namespace App\Http\Controllers\Ecole;

use App\Models\eleve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Ecole;

class EcoleController extends Controller
{
    public function index()
    {
        $ecoles = Ecole::all();
        $classes = Classe::all(); 
        $eleves = Eleve::where('ecole_id',session()->get('id'))->get();
        return view('pages.ecole.eleves.listes', compact('eleves','classes','ecoles'));
    }
    public function create()
    {
        $ecoles = Ecole::all();
        $classes = Classe::all();
        return view('pages.ecole.eleves.ajout', compact('classes', 'ecoles'));
    }
      

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eleve = new Eleve;
        $eleve->classe_id = $request->classe_id; 
        $eleve->ecole_id = session()->get('id');
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
        return redirect()->route('pages.ecole.eleves.listes')->with('success', 'enregistrement effectuée'); 
    }
    public function edit($id)
    {
        $ecoles = Ecole::all();
        $classes = Classe::all();
        $eleve = Eleve::find($id);
        return view('pages.ecole.eleves.edit', compact('eleve', 'classes','ecoles'));
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
        $eleve = eleve::find($id);
        $eleve->classe_id = $request->classe_id;
        $eleve->ecole_id = session()->get('id');
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
        return redirect()->route('pages.ecole.eleves.listes')->with('success', 'modification effectuée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->delete();
        return redirect()->route('pages.ecole.eleves.listes')->with('danger', 'suppression effectuée avec succès');
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