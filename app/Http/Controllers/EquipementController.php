<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\EquipementSortie;
use Illuminate\Support\Facades\Log;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        $equipements = Equipement::paginate(10);
        return view('equipements.listes', compact('equipements','ecoles'));
    }

    public function generatePdf(Request $request)
    {
       $id = decrypt($request->id);
       
       try {
            $sortieequipement = EquipementSortie::find($id);
            $pdf = PDF::loadView('equipementsorties.pdf', compact('sortieequipement'));
    
            Log::info('PDF généré avec succès');
    
            return $pdf->download('equipementsorties.pdf');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la génération du PDF :', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
    
            return response()->json(['error' => 'Échec de la génération du PDF'], 500);
        }
    }

    public function sortieslistes()
    {
        $ecoles = Ecole::all();
        $equipements = Equipement::all();
        $sortieequipements = EquipementSortie::paginate(10);
        return view('equipementsorties.listes', compact('equipements','ecoles','sortieequipements')); 
    }
    public function sortie($libelle)
    {
        $equipement = Equipement::where('libelle', $libelle)->first();
        $ecoles = Ecole::all();
        return view('equipements.sortie', compact('ecoles', 'equipement'));
    }

    public function savesortie(Request $request, $libelle)
    {
        $equipement = Equipement::where('libelle', $libelle)->first();
        if($request->quantite > $equipement->quantite)
        {
            toastr()->error('quantite insuffisante !!');
            return redirect()->back();

        }
        else
        {

            $sortieequipement = new EquipementSortie;
    
            $sortieequipement->date_sortie = $request->date_sortie;
            $sortieequipement->quantite = $request->quantite;
            $sortieequipement->ecole_id = $request->ecole_id;
            $sortieequipement->equipement_id = $equipement->id;
            $sortieequipement->save();
            if ($sortieequipement) 
            {
                $equipement->quantite = $equipement->quantite - $request->quantite;
                $equipement->save();
            }
            return redirect()->route('equipements.listes')->with('success', 'Enregistrement effectué');
        }


    }
    public function create()
    {
       $ecoles = Ecole::get();
        return view('equipements.ajout', compact('ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipement = new Equipement();
        $equipement->libelle = $request->libelle;
        $equipement->quantite = $request->quantite;
        $equipement->date_entre = $request->date_entre;
        $equipement->save();
        return redirect()->route('equipements.listes')->with('success', 'Enregistrement effectué');
    }

    public function edit($id)
    {
        $equipement = Equipement::find($id);
        return view('equipements.edit', compact('equipement'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipement = Equipement::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipement = Equipement::find($id);
        $equipement->libelle = $request->libelle;
        $equipement->quantite = $request->quantite;
        $equipement->date_entre = $request->date_entre;
        $equipement->save();
        return redirect()->route('equipements.listes')->with('success', 'modication effectuée'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipement = Equipement::find($id);
        $equipement->delete();
        return redirect()->route('equipements.listes')->with('danger', 'suppression effectuée');
    }
}
