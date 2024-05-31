<?php

namespace App\Http\Controllers;

use App\Models\grille;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Ecole;

class GrilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        $grilles = grille::all();
        return view('grilles.listes',['ecoles' => $ecoles], compact('grilles'));
    }


    public function generatePdf(Request $request)
    {
       $id = decrypt($request->id);
       
       try {
            $grille = grille::find($id);
            $pdf = PDF::loadView('grilles.pdf', compact('grille'));
    
            Log::info('PDF généré avec succès');
    
            return $pdf->download('grilles.pdf');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la génération du PDF :', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
    
            return response()->json(['error' => 'Échec de la génération du PDF'], 500);
        }
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
         $grille->nom = $request->nom;
        $grille->prenom = $request->prenom;
        $grille->statut = $request->statut;
        $grille->ecole_id = $request->ecole_id;
        $grille->classe_tenue = $request->classe_tenue;
        $grille->discipline = $request->discipline;
        $grille->theme = $request->theme;
        $grille->duree = $request->duree;
        $grille->effectif = $request->effectif;
        $grille->F = $request->F;
        $grille->G = $request->G;
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
        $grille->conseille1 = $request->conseille1;
        $grille->conseille2 = $request->conseille2;
        $grille->conseille3 = $request->conseille3;
        $grille->conseille4 = $request->conseille4;
        $grille->conseille5 = $request->conseille5;
        $grille->date = $request->date;

       
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
    public function edit($id)
    {
        $ecoles = Ecole::all();
        $grille = grille::find($id);
        return view('grilles.edit', compact('ecole','grille'));
    }
    public function update(Request $request, string $id)
    {
        $grille =  grille::find($id);
        $grille->nom = $request->nom;
       $grille->prenom = $request->prenom;
       $grille->statut = $request->statut;
       $grille->ecole_id = $request->ecole_id;
       $grille->classe_tenue = $request->classe_tenue;
       $grille->discipline = $request->discipline;
       $grille->theme = $request->theme;
       $grille->duree = $request->duree;
       $grille->effectif = $request->effectif;
       $grille->F = $request->F;
       $grille->G = $request->G;
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
       $grille->conseille1 = $request->conseille1;
       $grille->conseille2 = $request->conseille2;
       $grille->conseille3 = $request->conseille3;
       $grille->conseille4 = $request->conseille4;
       $grille->conseille5 = $request->conseille5;
       $grille->date = $request->date;

       $grille->save();
       return redirect()->route('grilles.listes')->with('success', 'Modificaation effectué');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grille = grille::find($id);
        $grille->delete();
        return redirect()->route('grilles.listes')->with('danger', 'suppression effectuée avec succèsx');
    }
}
