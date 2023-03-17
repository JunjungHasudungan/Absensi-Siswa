<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;

class Presence extends Component
{
    public  $teacher_id,
            $student_id,
            $subject_id,
            $subject,
            $attendance;
    public function render()
    {
        return view('livewire.presence', [
            $this->subject = Subject::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store()
    {

    }
}
