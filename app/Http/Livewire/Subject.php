<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;

class Subject extends Component
{
    public $subjectId, $name, $subjects;

    public function render()
    {
        $this->subjects = Subjects::all();

        return view('livewire.subject');
    }
}
