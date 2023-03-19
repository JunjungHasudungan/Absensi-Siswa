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
            $subject_name,
            $subject,
            $classrooms,
            $day,
            $start_time,
            $end_time,
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
        $this->openModalDetail();

        $subject = Subject::find($subject_id);

        foreach ($subject->classroomSubject as $mata_pelajaran) {
           $day = $mata_pelajaran->pivot->day;
           $start_time = $mata_pelajaran->pivot->start_time;
           $end_time = $mata_pelajaran->pivot->end_time;
        }
        $this->subject_name = $subject->name;
        $this->day = $day;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    public function openModalDetail()
    {
        return $this->is_detail = true;
    }

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }


}
