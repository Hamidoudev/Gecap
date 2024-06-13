<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Emplois;
use App\Models\Matiere;
use Livewire\Component;

class Filtre extends Component
{
    public $ecoles,$classes,$cycles,$emplois,$selectedClasse,$selectedCycle,$selectedEcole,$matieres;
    
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
    public function __construct()
    {
        $this->emplois = Emplois::all();
        $this->classes = Classe::all();
        $this->cycles = Cycle::all();
        $this->matieres = Matiere::all();
        $this->ecoles = Ecole::all();
    }

    public function render()
    {
        return view('livewire.filtre');
    }
}
