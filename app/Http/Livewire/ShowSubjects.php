<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;

class ShowSubjects extends Component
{
    public $subjects;

    public function render()
    {
        return view('livewire.show-subjects', [
            'subjects'  => Subject::all()
        ]);
    }
}
