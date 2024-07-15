<?php

namespace App\Http\Controllers\Ecole;

use App\Models\Eleve;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ecole;
use Illuminate\Support\Facades\Auth;

class EleveController extends Controller
{
    public function index()
    {
        $classes = Classe::all(); 
        $ecoleId = Auth::guard('ecole')->user()->id;
        $eleves = Eleve::where('ecole_id', $ecoleId)->get();
        return view('pages.ecole.eleves.listes', ['classes' => $classes], compact('eleves'));
    }

    public function create()
    {
        // Générer le matricule basé sur le dernier matricule existant
        $dernierMatricule = Eleve::max('matricule');
        $nouveauMatricule = $this->genererMatricule($dernierMatricule);

        // Charger la vue avec le formulaire et le matricule généré
        return view('pages.ecole.eleves.ajout', [
            'nouveauMatricule' => $nouveauMatricule
        ]);
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'matricule' => 'required|unique:eleves,matricule',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_n' => 'required|date',
            'adresse' => 'nullable|string',
            'genre' => 'required|in:F,M',
            'acte_n' => 'nullable|binary',
            'ecole_id' => 'required|exists:ecoles,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        // Création d'un nouvel élève avec les données validées
        $eleve = new Eleve();
        $eleve->classe_id = $request->classe_id;
        $eleve->ecole_id = Auth::guard('ecole')->user()->id;
        $eleve->matricule = $validatedData['matricule'];
        $eleve->nom = $validatedData['nom'];
        $eleve->prenom = $validatedData['prenom'];
        $eleve->date_n = $validatedData['date_n'];
        $eleve->adresse = $validatedData['adresse'];
        $eleve->genre = $validatedData['genre'];
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

        // Redirection avec un message de succès
        return redirect()->route('pages.ecole.eleves.listes')->with('success', 'Élève ajouté avec succès.');
    }

    private function genererMatricule($dernierMatricule)
    {
        if (!$dernierMatricule) {
            return 'E001';
        }

        // Extraire le numéro de matricule actuel et l'incrémenter
        $numero = intval(substr($dernierMatricule, 1));
        $nouveauNumero = $numero + 1;

        // Formater le nouveau matricule avec trois chiffres
        return 'E' . str_pad($nouveauNumero, 3, '0', STR_PAD_LEFT);

    }

    public function edit($id)
    {
       
        $classes = Classe::all();
        $eleve = eleve::find($id);
        return view('pages.ecole.eleves.edit', compact('eleve', 'classes'));
    }

        public function update(Request $request, string $id)
        {
            $eleve = Eleve::find($id);
            $eleve->classe_id = $request->classe_id;
            $eleve->ecole_id = Auth::guard('ecole')->user()->id;
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
