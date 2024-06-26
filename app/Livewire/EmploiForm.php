<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classe;
use App\Models\Ecole;
use App\Models\Cycle;
use App\Models\Enseignant;
use App\Models\Matiere;

class EmploiForm extends Component
{
    public $classes;
    public $ecoles;
    public $cycles;
    public $enseignants;
    public $matieres;

    public $selectedCycle = null;
    public $selectedClasse = null;
    public $selectedEcole = null;
    public $selectedEnseignant = null;
    public $emplois = [];

    public function mount()
    {
        $this->classes = Classe::all();
        $this->ecoles = Ecole::all();
        $this->cycles = Cycle::all();
        $this->enseignants = Enseignant::all();
        $this->matieres = Matiere::all();
    }

    public function updatedSelectedCycle($cycleId)
    {
        if ($cycleId == 1) {
            $this->selectedEnseignant = true;
        } else {
            $this->selectedEnseignant = false;
        }
    }



    public function render()
    {
        return view('livewire.emploi-form');
    }
}
