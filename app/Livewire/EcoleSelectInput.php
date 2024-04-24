<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ecole;

class EcoleSelectInput extends Component
{
    public $ecoles;

    public function mount()
    {
        $this->ecoles = Ecole::all();
    }

    public function render()
    {
        return view('livewire.ecole-select-input');
    }
}
