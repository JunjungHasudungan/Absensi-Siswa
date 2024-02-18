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
    public  $subjects,
            $student,
            $subject_name,
            $subject,
            $classrooms,
            $classroom,
            $classroom_name,
            $home_teacher,
            $classroom_id,
            $schedules_subject;

    public function render()
    {
        $classroom = Classroom::where('id', auth()->user()->classroom_id ?? '')->get();
        $schedules_subject = Subject::with(['classroomSubject'], function($query){
            $query->orderByPivot('day');
        })->get();
        // dd($classroom);

        foreach ($classroom as $kelas) {
            $this->classroom_name = $kelas->name ?? '';
            $this->home_teacher = $kelas->homeTeacher->name ?? '';
        }

        return view('livewire.student-subject', [
            $this->subjects = Subject::with(['classroomSubject'], function($query){
                                    $query->where('classroom_id', auth()->user()->classroom_id)
                                    ->orderByPivot('day')->latest()->get();
                    })->where('classroom_id', auth()->user()->classroom_id ?? '')->get(),
                ]);
    }

}
