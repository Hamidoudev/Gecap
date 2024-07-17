<?php

namespace App\Http\Controllers\Enseignant;

use Carbon\Carbon;
use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Classe;
use App\Models\Emplois;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\EmploisMatiere;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmploisController extends Controller
{
    
    public function index()
    {
        
        $enseignantId = Auth::guard('enseignant')->user()->id; 
        $ecoleId = Auth::guard('enseignant')->user()->ecole_id; 
        $emplois = Emplois::where('enseignant_id', $enseignantId)
                           ->where('ecole_id', $ecoleId)
                           ->get();
        $classes = Classe::all();
        $matieres = Matiere::all();
        $cycles = Cycle::all();
        $enseignants = Enseignant::all();
        $ecole = Ecole::find($ecoleId);
        
        return view('pages.enseignant.emplois.listes', compact('emplois','cycles','enseignants','classes', 'matieres','ecole'));
    }
    public function generatePdf($id)
    {
        $DetailEmploi = Emplois::where('id', $id)->first();
        $emploismatiereDetail = EmploisMatiere::where('emplois_id',$DetailEmploi->id)->get();
        $data = [
            'DetailEmploi' => $DetailEmploi,
            'emploismatiereDetail' => $emploismatiereDetail
        ];
        $pdf = Pdf::loadView('pages.enseignant.emplois.pdf', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('Emplois du temps - '.$todayDate . '.pdf');
       
    }
        
        public function create()
        {
            $classes = Classe::all();
            $matieres = Matiere::all();
            $cycles = Cycle::all();
            $enseignants = Enseignant::all();
            return view('pages.enseignant.emplois.ajout', compact('cycles','enseignants','classes', 'matieres'));
        }
    
        public function store(Request $request)
        {
            $validated = $request->validate([
                'classe_id' => 'required|integer',
                'cycle_id' => 'required|integer',
                'ecole_id' => 'required|integer',
                'enseignant_id' => 'required|integer',
                'emplois' => 'required|array',
            ]);
        
            foreach ($validated['emplois'] as $jour => $heures) {
                foreach ($heures as $heure => $details) {
                    if (isset($details['matiere_id']) && $details['matiere_id']) {
                        Emplois::create([
                            'classe_id' => $validated['classe_id'],
                            'cycle_id' => $validated['cycle_id'],
                            'ecole_id' => $validated['ecole_id'],
                            'enseignant_id' => $validated['enseignant_id'],
                            'matiere_id' => $details['matiere_id'],
                            'jour' => $jour,
                            'heure' => $heure,
                        ]);
                    }
                }
            }
        
            return redirect()->route('pages.ecole.emplois.listes')->with('success', 'Enregistrement effectué.');
        }
        
    
        public function edit($id)
        {
            $emploi = Emplois::find($id);
            $ecoles = Ecole::find($id);
            $classes = Classe::find($id);
            $matieres = Matiere::find($id);
            $enseignants = Enseignant::find($id);
            return view('pages.enseignant.emplois.edit', compact('emploi','enseignants', 'classes','ecoles',  'matieres'));
        }
    
        public function show(string $id)
    {
        // $emploi = Emplois::with(['classes', 'cycles', 'ecoles','enseignants', 'matieres'])->findOrFail($id);
        $DetailEmploi = Emplois::where('id', $id)->first();
        $emploismatiereDetail = EmploisMatiere::where('emplois_id',$DetailEmploi->id)->get();
        return view('pages.enseignant.emplois.vue',compact('DetailEmploi','emploismatiereDetail'));
    }
        public function vue(Request $request, string $id)
        {
            $validated = $request->validate([
                'classe_id' => 'required|integer',
                'cycle_id' => 'required|integer',
                'ecole_id' => 'required|integer',
                'enseignant_id' => 'required|integer',
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
        
          
        }
    
        public function update(Request $request, string $id)
        {
            $validated = $request->validate([
                'classe_id' => 'required|integer',
                'cycle_id' => 'required|integer',
                'ecole_id' => 'required|integer',
                'enseignant_id' => 'required|integer',
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
        
            return redirect()->route('pages.enseignant.emplois.listes')->with('success', 'Mise à jour effectuée.');
        }
        public function destroy(string $id)
        {
            $emploi = Emplois::find($id);
            $emploi->delete();
            return redirect()->route('pages.enseignant.emplois.listes')->with('danger', 'Suppression effectuée avec succes.');
        }
        public function showSchedule($jour, $heure)
    {
        
        $selectedMatiere = Emplois::where('jour', $jour)
                                ->where('heure', $heure)
                                ->with('matiere')
                                ->first();
    
        return view('pages.enseignant.emplois.pdf', [
            'jour' => $jour,
            'heure' => $heure,
            'selectedMatiere' => $selectedMatiere ? $selectedMatiere->matiere : null,
            'matieres' => Matiere::all(),
        ]);
    }
}
    