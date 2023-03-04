<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Administration as Administrations;

class AdministrationComment extends Component
{
    public $id_administration,
            $administrations,
            $comment;

    public function render()
    {
        return view('livewire.administration-comment', [
            $this->administrations = Administrations::all()
        ]);
    }

    public function sendComment($id_administration)
    {
        $administration =  Administrations::find($id_administration);
        dd($administration);
    }
}
