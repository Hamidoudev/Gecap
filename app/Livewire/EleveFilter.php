<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ecole;
use App\Models\Classe;
use App\Models\Eleve;

class EleveFilter extends Component
{
    public $selectedClasse = '';
    public $selectedEcole = '';
    public $ecoles;
    public $classes;
    public $eleves;

    public function mount()
    {
        $this->ecoles = Ecole::all();
        $this->classes = Classe::all();
        $this->eleves = Eleve::all();
    }

    public function updatedSelectedClasse()
    {
        $this->filterEleves();
    }

    public function updatedSelectedEcole()
    {
        $this->filterEleves();
    }

    public function filterEleves()
    {
        $query = Eleve::query();

        if ($this->selectedClasse) {
            $query->where('classe_id', $this->selectedClasse);
        }

        if ($this->selectedEcole) {
            $query->where('ecole_id', $this->selectedEcole);
        }

        $this->eleves = $query->get();
    }

    public function render()
    {
        return view('livewire.eleve-filter');
    }
}
