<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classroom as Classrooms;

class Classroom extends Component
{
    // properti
    public $classroomId, $name, $classrooms;

    public function render()
    {
        $this->classrooms = Classrooms::with('users')->get();

        return view('livewire.classroom');
    }
}
