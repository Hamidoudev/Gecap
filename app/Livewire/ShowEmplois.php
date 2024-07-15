<?php

namespace App\Livewire;

use App\Models\Emplois;
use Livewire\Component;

class ShowEmplois extends Component
{
    public $emplois;
    public $showModal = false;

    public $selectedClasseLibelle;
    public $selectedCycleLibelle;
    public $selectedEnseignantNom;
    public $heure_debut = [];
    public $heure_fin = [];
    public $jour = [];
    public $matiereLibelle = [];
    public $enseignantNom = [];
    public $selectedCycle;
    public $showInput = 1;

    public $emploisIdToDisplay;

    public function mount($emploisId)
    {
        $this->emploisIdToDisplay = $emploisId;
    }

    protected $listeners = ['openShowEmploisModal'];

    public function openShowEmploisModal($emploisId)
    {
        $this->emplois = Emplois::with('classe', 'cycle', 'enseignant', 'emploisMatieres.matiere', 'emploisMatieres.enseignant')->find($emploisId);
        $this->selectedClasseLibelle = $this->emplois->classe->libelle;
        $this->selectedCycleLibelle = $this->emplois->cycle->libelle;
        $this->selectedEnseignantNom = $this->emplois->enseignant->nom;
        $this->selectedCycle = $this->emplois->cycle->id;

        foreach ($this->emplois->emploisMatieres as $key => $emploiMatiere) {
            $this->heure_debut[$key] = $emploiMatiere->heure_debut;
            $this->heure_fin[$key] = $emploiMatiere->heure_fin;
            $this->jour[$key] = $emploiMatiere->jour;
            $this->matiereLibelle[$key] = $emploiMatiere->matiere->libelle;
            $this->enseignantNom[$key] = $emploiMatiere->enseignant->nom;
        }

        $this->showModal = true;
    }

    public function closeShowEmploisModal()
    {
        $this->showModal = false;
    }
    public function render()
{
    $emplois = Emplois::with('emploisMatieres.matiere', 'emploisMatieres.enseignant')
                      ->find($this->emploisIdToDisplay);

    if (!$emplois) {
        abort(404); // Gérer le cas où l'emploi n'est pas trouvé
    }

    return view('livewire.show-emplois', compact('emplois'));
}

}
