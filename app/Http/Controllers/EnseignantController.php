<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();
        $enseignants = Enseignant::where('ecole_id',session()->get('id'))->get();
        return view('pages.ecole.enseignants.listes', compact('enseignants','matieres'));
    }

    public function create()
    {
        $matieres = Matiere::all();
        return view('pages.ecole.enseignants.ajout', compact('matieres'));
    }

    public function store(Request $request)
    {
        $enseignant = new Enseignant();
        $enseignant->ecole_id = session()->get('id');
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Le type de fichier n\'est pas autorisé.');
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('mes_cv'), $fileName);
            $enseignant->cv = $fileName;
        }

        $enseignant->save();

        // Associer les matières
        $enseignant->matieres()->attach($request->matieres);

        return redirect()->route('pages.ecole.enseignants.listes')->with('success', 'Enregistrement effectué avec succès');
    }

    public function edit($id)
    {
        $enseignant = Enseignant::find($id);
        $matieres = Matiere::all();
        return view('pages.ecole.enseignants.edit', compact('enseignant', 'matieres'));
    }

    public function update(Request $request, $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->ecole_id = session()->get('id');
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Le type de fichier n\'est pas autorisé.');
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('mes_cv'), $fileName);
            $enseignant->cv = $fileName;
        }

        $enseignant->save();

        // Mettre à jour les matières associées
        $enseignant->matieres()->sync($request->matieres);

        return redirect()->route('pages.ecole.enseignants.listes')->with('success', 'Modification effectuée avec succès');
    }

    public function destroy($id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->delete();
        return redirect()->route('pages.ecole.enseignants.listes')->with('danger', 'Suppression effectuée avec succès');
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
