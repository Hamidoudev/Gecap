<?php

namespace App\Http\Controllers\Ecole;

use App\Models\Type;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EnseignantMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EnseignantController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $matieres = Matiere::all();
        $ecoleId = Auth::guard('ecole')->user()->id;
        $enseignants = Enseignant::where('ecole_id', $ecoleId)->get();
          return view('pages.ecole.enseignants.listes', compact('enseignants','matieres','types'));
    }

    public function create()
    {
        $matieres = Matiere::all();
        return view('pages.ecole.enseignants.ajout', compact('matieres'));
    }

    public function store(Request $request)
    {
        $password = $request->password;
        $enseignant = new Enseignant();
        $enseignant->ecole_id =Auth::guard('ecole')->user()->id;
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;
        $enseignant->type_id = 5;
        $enseignant->password =Hash::make($request->password);
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
        $data = [
        
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $password
        ];
        $enseignant->save();
        Mail::to($request->email)
                         ->queue(new EnseignantMail($data));
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
        $enseignant->ecole_id =Auth::guard('ecole')->user()->id;
        $enseignant->matricule = $request->matricule;
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->date_n = $request->date_n;
        $enseignant->email = $request->email;
        $enseignant->telephone = $request->telephone;
        $enseignant->adresse = $request->adresse;
        $enseignant->type_id = 5;
        $enseignant->password = Hash::make($request->password);
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
