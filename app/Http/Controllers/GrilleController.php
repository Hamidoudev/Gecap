<?php

namespace App\Http\Controllers;

use App\Models\grille;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;


class GrilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grilles = grille::all();
        return view('grilles.listes', compact('grilles'));
    }

    public function generatePDF()
    {
        $grille = grille::all();
        $pdf = PDF::loadView('grille.pdf', compact('grilles'));
        return $pdf->download('grilles.pdf');
    }

    public function create()
    {
        return view('grilles.ajout');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grille = new grille();
        $grille->prenom = $request->prenom;
        $grille->statut = $request->statut;
        $grille->ecole = $request->ecole;
        $grille->classe_tenue = $request->classe_tenue;
        $grille->discipline = $request->discipline;
        $grille->theme = $request->theme;
        $grille->duree = $request->duree;
        $grille->nom = $request->nom;
        $grille->effectif = $request->effectif;
        $grille->fiche_preparation = $request->fiche_preparation;
        $grille->materiel_didactique = $request->materiel_didactique;
        $grille->utilisation_materiel = $request->utilisation_materiel;
        $grille->opo_annonces = $request->opo_annonces;
        $grille->methode_pertinente = $request->methode_pertinente;
        $grille->eleves_activite = $request->eleves_activite;
        $grille->contenu_conforme = $request->contenu_conforme;
        $grille->contenu_maitrise = $request->contenu_maitrise;
        $grille->techniques_animation = $request->techniques_animation;
        $grille->exercices_evaluation = $request->exercices_evaluation;
        $grille->total_points = $request->total_points;

        $grille->save();
        return redirect()->route('grilles.listes')->with('success', 'Enregistrement effectué');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
