<?php

namespace App\Http\Livewire;

use App\Models\{
    Classroom as Classrooms,
    Subject as Subjects,
};
use Livewire\Component;

class ClassroomSubject extends Component
{
    public  $subjects,
            $subject,
            $classroom,
            $classrooms,
            $classroom_id,
            $select_subject = '',
            $subject_id;
    public $all_subject = [];

    public function mount()
    {
        if(!empty($this->subject_id)){
            $this->all_subject = Subjects::with('classroomSubject')->get();
        }
        // dd($this->all_subject);
    }

    public function render()
    {
        return view('livewire.classroom-subject', [
            $this->subjects = Subjects::with('classroomSubject')->get(),
        ]);
    }
}
