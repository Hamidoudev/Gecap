<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Emplois;
use App\Models\Matiere;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;


class EmploisController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        $matieres = Matiere::all();
        $ecoles = Ecole::all();
        $cycles = Cycle::all();
        $emplois = Emplois::paginate(10);
        return view('emplois.listes', compact('cycles','classes','ecoles', 'matieres', 'emplois'));
    }

    public function generatePdf(Request $request)
    {
       $id = decrypt($request->id);
       
       try {
            $emploi = Emplois::find($id);
            $pdf = PDF::loadView('emplois.pdf', compact('emploi'));
    
            Log::info('PDF généré avec succès');
    
            return $pdf->download('emplois.pdf');
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
        $classes = Classe::all();
        $ecoles = Ecole::all();
        $matieres = Matiere::all();
        $cycles = Cycle::all();
        return view('emplois.ajout', compact('cycles','classes','ecoles', 'matieres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'classe_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'ecole_id' => 'required|integer',
            'emplois' => 'required|array',
        ]);
    
        foreach ($validated['emplois'] as $jour => $heures) {
            foreach ($heures as $heure => $details) {
                if (isset($details['matiere_id']) && $details['matiere_id']) {
                    Emplois::create([
                        'classe_id' => $validated['classe_id'],
                        'matiere_id' => $details['matiere_id'],
                        'jour' => $jour,
                        'heure' => $heure,
                    ]);
                }
            }
        }
    
        return redirect()->route('emplois.listes')->with('success', 'Enregistrement effectué.');
    }
    

    public function edit($id)
    {
        $emploi = Emplois::find($id);
        $ecoles = Ecole::find($id);
        $classes = Classe::all();
        $matieres = Matiere::all();
        return view('emplois.edit', compact('emploi', 'classes','ecoles',  'matieres'));
    }

    public function show(string $id)
    {
        $emploi = Emplois::find($id);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'classe_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'ecole_id' => 'required|integer',
            'emplois' => 'required|array',
        ]);
    
        Emplois::where('classe_id', $validated['classe_id'])->delete();
    
        foreach ($validated['emplois'] as $jour => $heures) {
            foreach ($heures as $heure => $details) {
                if (isset($details['matiere_id']) && $details['matiere_id']) {
                    Emplois::create([
                        'classe_id' => $validated['classe_id'],
                        'matiere_id' => $details['matiere_id'],
                        'jour' => $jour,
                        'heure' => $heure,
                    ]);
                }
            }
        }
    
        return redirect()->route('emplois.listes')->with('success', 'Mise à jour effectuée.');
    }
    public function destroy(string $id)
    {
        $emploi = Emplois::find($id);
        $emploi->delete();
        return redirect()->route('emplois.listes')->with('danger', 'Suppression effectuée.');
    }
    public function showSchedule($jour, $heure)
{
    // Exemple de récupération de la matière sélectionnée
    $selectedMatiere = Emplois::where('jour', $jour)
                            ->where('heure', $heure)
                            ->with('matiere')
                            ->first();

    return view('emplois.pdf', [
        'jour' => $jour,
        'heure' => $heure,
        'selectedMatiere' => $selectedMatiere ? $selectedMatiere->matiere : null,
        'matieres' => Matiere::all(),
    ]);
}

}
