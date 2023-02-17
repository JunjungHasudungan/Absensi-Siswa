<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Administration as Administrations;

class Administration extends Component
{
    public $administrations;

    public function render()
    {
        $this->administrations = Administration::all();

        return view('livewire.administration');
    }
}
