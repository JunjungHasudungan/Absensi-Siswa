<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    Subject as Subjects,
    Classroom as Classrooms,
};

class TeacherAdministratrion extends Component
{
    public $administration,
            $classrooms,
            $subjects,
            $search,
            $is_create = false,
            $is_detail = false,
            $is_search = false;

    public function render()
    {
        return view('livewire.teacher-administratrion');
    }

    public function openCreateAdministration()
    {
        return $this->is_create = true;
    }

    public function closeCreateAdministration()
    {
        return $this->is_create = false;
    }

    public function createAdministration()
    {
        dd('Testing Administration create');
    }
}
