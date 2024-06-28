<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Emplois;
use App\Models\Enseignant;
use App\Models\Matiere;
use Livewire\Component;

class Filtre extends Component
{
    public  $ecoles,$classes,$cycles,$emplois,$selectedClasse,$selectedCycle,$selectedEcole,$matieres = [];
    public $showInput = false;
    public $matiere_id=[];
    public $enseignants=[];
    public $enseignant_id=[];
    public  $schedules= [];
    public $afficherliste = true;
    public $afficherform = false;

    public function mount()
    {
        $this->matieres = Matiere::all();
        $this->enseignants = collect();
        $this->addSchedule();
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



    public function removeSchedule($index)
    {
        unset($this->schedules[$index]);
        $this->schedules = array_values($this->schedules);
    }

    public function updatedSchedules($value, $name)
    {
        list($index, $field) = explode('.', $name);
        if ($field == 'matiere_id') {
            $this->schedules[$index]['enseignant_id'] = '';
            $this->enseignants[$index] = Enseignant::where('matiere_id', $value)->get();
        }
    }
  

    public function selectChanged()
    {
       
        $this->emplois = Emplois::all();

        if($this->selectedClasse) 
        {
            $classe = Classe::find($this->selectedClasse);
            if($classe)
            {
            $this->emplois = Emplois::where("classe_id",$classe->id)->get();
            }
        }
        if($this->selectedEcole) 
        {
            $ecole = Ecole::find($this->selectedEcole);
            if($ecole)
            {
            $this->emplois = Emplois::where("ecole_id",$ecole->id)->get();
            }
        }

        if($this->selectedCycle)
        {
            $cycle = Cycle::find($this->selectedCycle);
            
            if($cycle)
            {
                $this->emplois = Emplois::where("cycle_id",$cycle->id)->get();
            }
        }
         if($this->selectedClasse && $this->selectedCycle && $this->selectedEcole)
         {
            $classe = Classe::find($this->selectedClasse);
            $cycle = Cycle::find($this->selectedCycle);
            $ecole = Ecole::find($this->selectedEcole);
            $emplois = Emplois::where("cycle_id",$cycle->id)
            ->where("classe_id",$classe->id)->where("ecole_id",$ecole->id)->get();;
            $this->emplois = $emplois;

         }

    }
    public function addSchedule()
    {
        $this->schedules[] = [
            'heure_debut' => '',
            'heure_fin' => '',
            'jour' => '',
            'matiere_id' => '',
            'enseignant_id' => ''
        ];
        $this->enseignants[] = collect();
    }

    public function changeCycle()
    {
        // dd($this->selectedCycle);
        if($this->selectedCycle == 1)
        {
            $this->showInput = true;
            $cycle = Cycle::find($this->selectedCycle);
            $this->matieres = $cycle->matieres;
             
        }
        else{
            $cycle = Cycle::find($this->selectedCycle);
            $this->matieres = $cycle->matieres;
            $this->showInput = false;
        }
    }
    public function chargeEnseignant($id)
    {
         dd(($this->matiere_i));

         $matiere = Matiere::find($id);

        if ($matiere) {
            $this->enseignants = $matiere->enseignants;
        }
    }

    public function __construct()
    {
        $this->emplois = Emplois::all();
        $this->classes = Classe::all();
        $this->cycles = Cycle::all();
        $this->ecoles = Ecole::all();
        $this->enseignants = Enseignant::all();
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
        return view('livewire.filtre');
    }
}
