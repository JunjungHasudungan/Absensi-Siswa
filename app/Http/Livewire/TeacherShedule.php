<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;

class TeacherShedule extends Component
{
    public  $subjects,
            $is_detail;

    public function render()
    {
        return view('livewire.teacher-shedule', [
            $this->subjects  => Subject::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
