<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
        Classroom,
        User,
        Subject,
    };

class StudentSubject extends Component
{
    public  $is_detail,
            $subjects,
            $student,
            $subject,
            $classrooms,
            $name,
            $classroom,
            $classroom_name,
            $home_teacher,
            $classroom_id,
            $subject_id;

    public function render()
    {
        $classroom = Classroom::where('id', auth()->user()->classroom_id ?? '')->get();

        foreach ($classroom as $kelas) {
            $this->classroom_name = $kelas->name ?? '';
            $this->home_teacher = $kelas->homeTeacher->name ?? '';
        }

        return view('livewire.student-subject', [
            $this->subjects = Subject::with(['classroomSubject'], function($query){
                                        $query->where('classroom_id', auth()->user()->classroom_id)->get();
                    })->get(),
        ]);
    }

    public function detailClassroom($subject_id)
    {
        dd($subject_id);
    }
}
