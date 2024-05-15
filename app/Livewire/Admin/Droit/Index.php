<?php

namespace App\Livewire\Admin\Droit;

use App\Models\Droit;
use Livewire\Component;

class Index extends Component
{
    public $droits;
    public function render()
    {
        $this->droits = Droit::get();
        return view('livewire.admin.droit.index');
    }
}
