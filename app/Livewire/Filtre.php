<?php

namespace App\Livewire;

use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Classe;
use App\Models\Emplois;
use App\Models\EmploisMatiere;
use App\Models\Matiere;
use Livewire\Component;
use App\Models\Enseignant;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class Filtre extends Component
{
    public $selectedEnseignant, $ecoles, $classes, $cycles, $emplois, $selectedClasse, $selectedCycle, $selectedEcole;
    public $showInput = false;
    public $matiere_id = [];
    public $emploiId;
    public $matieres = [];
    public $enseignants = [];
    public $enseignant_id = [];
    public  $schedules = [];
    public  $fields = [];
    public $afficherliste = true;
    public $afficherform = false;
    public $editMode = false;
    public $heure_debut = [];
    public $heure_fin = [];
    public $jour = [];
    public $ListesEnseignants = [];



    public function mount()
    {
        $this->matieres = Matiere::all();
        $this->enseignants = collect();

        $this->emplois = DB::table("emplois")->get();
    }

    public function enterEditMode($emploiId)
    {
        $this->editMode = true;
        $this->loadEmploi($emploiId);
    }





    public function active()
    {
        $this->afficherform = true;
        $this->afficherliste = false;
    }

    public function retour()
    {
        $this->afficherliste = true;
        $this->afficherform = false;
    }
    public function ActiveEdit()
    {

        $this->afficherliste = false;
        $this->editMode = true;
    }

    public function RetourEdit()
    {
        $this->afficherliste = true;
        $this->editMode = false;
    }

    public function loadEmploi($emploiId)
    {
        $emploi = Emplois::find($emploiId);
        $this->emploiId = $emploi->id;
        $this->selectedClasse = $emploi->classe_id;
        $this->selectedEcole = $emploi->ecole_id;
        $this->selectedCycle = $emploi->cycle_id;
        $this->heure_debut = $emploi->heure_debut;
        $this->heure_fin = $emploi->heure_fin;
        $this->jour = $emploi->jour;
        $this->matiere_id = $emploi->matiere_id;
        $this->enseignant_id = $emploi->enseignant_id;
    }

    public function updateEmploi()
    {
        $this->validate([
            'selectedClasse' => 'required',
            'selectedEcole' => 'required',
            'selectedCycle' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'jour' => 'required',
            'matiere_id' => 'required',
        ]);

        $emploi = Emplois::find($this->emploiId);
        $emploi->update([
            'classe_id' => $this->selectedClasse,
            'ecole_id' => $this->selectedEcole,
            'cycle_id' => $this->selectedCycle,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'jour' => $this->jour,
            'matiere_id' => $this->matiere_id,
            'enseignant_id' => $this->enseignant_id,
        ]);

        $this->RetourEdit();
    }

    public function resetForm()
    {
        $this->selectedClasse = null;
        $this->selectedEcole = null;
        $this->selectedCycle = null;
        $this->matiere_id = null;
        $this->heure_debut = null;
        $this->heure_fin = null;
        $this->jour = null;
        $this->enseignant_id = null;
    }

    public function selectChanged()
    {

        $this->emplois = Emplois::all();

        if ($this->selectedClasse) {
            $classe = Classe::find($this->selectedClasse);
            if ($classe) {
                $this->emplois = Emplois::where("classe_id", $classe->id)->get();
            }
        }
        if ($this->selectedEcole) {
            $ecole = Ecole::find($this->selectedEcole);
            if ($ecole) {
                $this->emplois = Emplois::where("ecole_id", $ecole->id)->get();
            }
        }

        if ($this->selectedCycle) {
            $cycle = Cycle::find($this->selectedCycle);

            if ($cycle) {
                $this->emplois = Emplois::where("cycle_id", $cycle->id)->get();
            }
        }
        if ($this->selectedClasse && $this->selectedCycle && $this->selectedEcole) {
            $classe = Classe::find($this->selectedClasse);
            $cycle = Cycle::find($this->selectedCycle);
            $ecole = Ecole::find($this->selectedEcole);
            $emplois = Emplois::where("cycle_id", $cycle->id)
                ->where("classe_id", $classe->id)->where("ecole_id", $ecole->id)->get();;
            $this->emplois = $emplois;
        }
    }


    public function changeCycle()
    {
        // dd($this->selectedCycle);
        if ($this->selectedCycle == 1) {
            $this->showInput = true;
            $cycle = Cycle::find($this->selectedCycle);
            $this->matieres = $cycle->matieres;
            $this->ListesEnseignants = Enseignant::all();
        } else {
            $cycle = Cycle::find($this->selectedCycle);
            $this->matieres = $cycle->matieres;
            $this->showInput = false;
        }
    }

    public function addField()
    {
        $this->fields[] = 1;
        $cycle = Cycle::find($this->selectedCycle);
        $this->matieres = $cycle->matieres;
    }

    public function removeField($id)
    {
        unset($this->fields[$id]);
        $this->fields = array_values($this->fields);
    }

    public function chargeEnseignant($id, $key)
    {

        $matiere = Matiere::find($id);
        if ($matiere) {
            $this->enseignants[$key] = $matiere->enseignants;
        } else {
            $this->enseignants[$key] = [];
        }
    }

    public function __construct()
    {
        $this->emplois = Emplois::all();
        $this->classes = Classe::all();
        $this->cycles = Cycle::all();
        $this->ecoles = Ecole::all();
        $this->enseignants = Enseignant::all();
        $this->ListesEnseignants = Cycle::find(1)->enseignants;
    }

    public function saveEmplois()
    {
        // dd(Auth::user()->username);
        if ($this->selectedClasse && $this->selectedEcole && $this->selectedCycle) {
            if ($this->selectedCycle == 1) {
                if ($this->selectedEnseignant) {
                    if (count($this->heure_debut) == count($this->heure_fin) && count($this->heure_fin) && count($this->heure_fin) == count($this->jour) && count($this->jour) == count($this->matiere_id)) {
                        DB::beginTransaction();
                        try {
                            $emplois = new Emplois;
                            $emplois->classe_id = $this->selectedClasse;
                            $emplois->ecole_id = $this->selectedEcole;
                            $emplois->enseignant_id = $this->selectedEnseignant;
                            $emplois->cycle_id = $this->selectedCycle;
                            $emplois->save();
                            for ($i = 0; $i < count($this->heure_debut); $i++) {

                                if ($this->heure_debut[$i] > $this->heure_fin[$i]) {
                                    Toastr::error("Heure de debut superieur à heure de fin");
                                    continue;
                                }
                                $emploisMatiere = new EmploisMatiere;
                                $emploisMatiere->emplois_id = $emplois->id;
                                $emploisMatiere->matiere_id = $this->matiere_id[$i];
                                $emploisMatiere->jour = $this->jour[$i];
                                $emploisMatiere->heure_debut = $this->heure_debut[$i];
                                $emploisMatiere->heure_fin = $this->heure_fin[$i];
                                $emploisMatiere->save();
                                //    Emplois::firstOrCreate(
                                //         [
                                //             "classe_id" => $this->selectedClasse,
                                //             "ecole_id" => $this->selectedEcole,
                                //             "enseignant_id" => $this->selectedEnseignant,
                                //             "cycle_id" => $this->selectedCycle,
                                //             "matiere_id" => $this->matiere_id[$i],
                                //             "jour"=>$this->jour[$i],
                                //             "heure_debut"=>$this->heure_debut[$i],
                                //             "heure_fin"=>$this->heure_fin[$i],
                                //         ]
                                //         );
                            }
                            DB::commit();
                            Toastr::success("Emploi du temps ajouter avec succes!");
                            return redirect()->to(route("emplois.listes"));
                        } catch (\Exception $e) {
                            Toastr::error($e->getMessage(), "Erreur:");
                            DB::rollback();
                            return 0;
                        }
                    } else {
                        Toastr::error("Veuillez remplir tous les champs");
                        DB::rollback();
                        return 0;
                    }
                } else {
                    Toastr::error("Veuillez remplir tous les champs");
                    DB::rollback();
                    return 0;
                }
            } else {
                if (count($this->heure_debut) == count($this->heure_fin) && count($this->heure_fin) == count($this->matiere_id) && count($this->matiere_id) == count($this->enseignant_id)) {
                    DB::beginTransaction();
                    try {
                        for ($i = 0; $i < count($this->heure_debut); $i++) {
                            if ($this->heure_debut[$i] > $this->heure_fin[$i]) {
                                Toastr::error("Erreur", "Heure de debut superieur a heure de fin");
                                continue;
                            }
                            $enseignantAlreadyBusy = Emplois::where(
                                [
                                    ["enseignant_id", $this->enseignant_id[$i]],
                                    ["jour", $this->jour[$i]],
                                    ["heure_debut", $this->heure_debut[$i]],
                                    ["heure_fin", $this->heure_fin[$i]],
                                ]
                            )->get();
                            if (count($enseignantAlreadyBusy)) {
                                Toastr::error("Erreur", "Enseignant " . Enseignant::find($this->enseignant_id[$i])->prenom . " déjà affecter ");
                                continue;
                            }

                            Emplois::firstOrCreate(
                                [
                                    "classe_id" => $this->selectedClasse,
                                    "ecole_id" => $this->selectedEcole,
                                    "enseignant_id" => $this->enseignant_id[$i],
                                    "cycle_id" => $this->selectedCycle,
                                    "matiere_id" => $this->matiere_id[$i],
                                    "jour" => $this->jour[$i],
                                    "heure_debut" => $this->heure_debut[$i],
                                    "heure_fin" => $this->heure_fin[$i],
                                ]
                            );
                        }
                        DB::commit();
                        Toastr::success("Emploi du temps ajouter avec succes!");
                        return redirect()->to(route("emplois.listes"));
                    } catch (\Exception $e) {
                        Toastr::error($e->getMessage(), "Erreur: ");
                        DB::rollback();
                        return 0;
                    }
                } else {
                    Toastr::error("Veuillez remplir tous les champs");
                    DB::rollback();
                    return 0;
                }
            }
        } else {
            Toastr::error("Veuillez remplir tous les champs");
            DB::rollback();
            return 0;
        }
    }
    public function saveEmploisEdit($id)
    {

        if ($this->selectedClasse && $this->selectedEcole && $this->selectedCycle) {
            if ($this->selectedCycle == 1) {
                if ($this->selectedEnseignant) {
                    if (count($this->heure_debut) == count($this->heure_fin) && count($this->heure_fin) == count($this->matiere_id)) {
                        DB::beginTransaction();
                        try {
                            $emplois = Emplois::find($id);
                            if ($emplois) {
                                for ($i = 0; $i < count($this->heure_debut); $i++) {
                                    if ($this->heure_debut[$i] > $this->heure_fin[$i]) {
                                        Toastr::error("Heure de debut superieur a heure de fin");
                                        continue;
                                    }

                                    $emplois->update([
                                        "classe_id" => $this->selectedClasse,
                                        "ecole_id" => $this->selectedEcole,
                                        "enseignant_id" => $this->selectedEnseignant,
                                        "cycle_id" => $this->selectedCycle,
                                        "matiere_id" => $this->matiere_id[$i],
                                        "jour" => $this->jour[$i],
                                        "heure_debut" => $this->heure_debut[$i],
                                        "heure_fin" => $this->heure_fin[$i],
                                    ]);
                                }
                                DB::commit();
                                Toastr::success("Emploi du temps modifier avec succes!");
                                return redirect()->to(route("emplois.listes"));
                            } else {
                                Toastr::error("Emploi du temps introuvable");
                                DB::rollback();
                                return 0;
                            }
                        } catch (\Exception $e) {
                            Toastr::error($e->getMessage(), "Erreur:");
                            DB::rollback();
                            return 0;
                        }
                    } else {
                        Toastr::error("Veuillez remplir tous les champs");
                        DB::rollback();
                        return 0;
                    }
                } else {
                    Toastr::error("Veuillez remplir tous les champs");
                    DB::rollback();
                    return 0;
                }
            } else {
                if (count($this->heure_debut) == count($this->heure_fin) && count($this->heure_fin) == count($this->matiere_id) && count($this->matiere_id) == count($this->enseignant_id)) {
                    DB::beginTransaction();
                    try {
                        $emplois = Emplois::find($id);
                        if ($emplois) {
                            for ($i = 0; $i < count($this->heure_debut); $i++) {
                                if ($this->heure_debut[$i] > $this->heure_fin[$i]) {
                                    Toastr::error("Erreur", "Heure de debut superieur a heure de fin");
                                    continue;
                                }
                                $enseignantAlreadyBusy = Emplois::where(
                                    [
                                        ["enseignant_id", $this->enseignant_id[$i]],
                                        ["jour", $this->jour[$i]],
                                        ["heure_debut", $this->heure_debut[$i]],
                                        ["heure_fin", $this->heure_fin[$i]],
                                    ]
                                )->get();
                                if (count($enseignantAlreadyBusy)) {
                                    Toastr::error("Erreur", "Enseignant " . Enseignant::find($this->enseignant_id[$i])->prenom . " déjà affecter ");
                                    continue;
                                }

                                $emplois->update([
                                    "classe_id" => $this->selectedClasse,
                                    "ecole_id" => $this->selectedEcole,
                                    "enseignant_id" => $this->enseignant_id[$i],
                                    "cycle_id" => $this->selectedCycle,
                                    "matiere_id" => $this->matiere_id[$i],
                                    "jour" => $this->jour[$i],
                                    "heure_debut" => $this->heure_debut[$i],
                                    "heure_fin" => $this->heure_fin[$i],
                                ]);
                            }
                            DB::commit();
                            Toastr::success("Emploi du temps modifier avec succes!");
                            return redirect()->to(route("emplois.listes"));
                        } else {
                            Toastr::error("Emploi du temps introuvable");
                            DB::rollback();
                            return 0;
                        }
                    } catch (\Exception $e) {
                        Toastr::error($e->getMessage(), "Erreur: ");
                        DB::rollback();
                        return 0;
                    }
                } else {
                    Toastr::error("Veuillez remplir tous les champs");
                    DB::rollback();
                    return 0;
                }
            }
        } else {
            Toastr::error("Veuillez remplir tous les champs");
            DB::rollback();
            return 0;
        }
    }

    public function save()
    {
        $this->validate([
            'schedules.*.heure_debut' => 'required',
            'schedules.*.heure_fin' => 'required',
            'schedules.*.jour' => 'required',
            'schedules.*.matiere_id' => 'required',
            'schedules.*.enseignant_id' => 'required_if:selectedCycle,2',
        ]);

        // Logic to save the data
    }


    public function render()
    {
        // Récupérer les emplois du temps avec les informations nécessaires

        return view('livewire.filtre');
    }
}
