<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;
use Carbon\Carbon;

class Shedule extends Component
{
    public  $subjects,
            $id_subject,
            $is_detail,
            $classroom_name,
            $day,
            $days,
            $start_time,
            $end_time,
            $subject_name,
            $homeTeacher,
            $homeTeacher_id;
    public function render()
    {

        $this->homeTeacher = Subjects::with(['classroom', 'classroomSubject'], function($query){
            $query->where('user_id', auth()->user()->id);
        })->where('user_id', auth()->user()->id)->get();

        foreach($this->homeTeacher as $home_teacher){
            $homeTeacher_id = $home_teacher->classroom->user_id;
            $classroom_name = $home_teacher->classroom->name;
        }

        return view('livewire.shedule', [
            $this->subjects = Subjects::with(['teacher', 'classroomSubject'])
            ->where('user_id', auth()->user()->id)->get(),
            $this->homeTeacher_id = $homeTeacher_id,
            $this->classroom_name = $classroom_name,
        ]);
    }

    public function isOpenDetail()
    {
        return $this->is_detail = true;
    }

    public function isCloseDetail()
    {
        return $this->is_detail = false;
    }

    public function detailSheduleSubject(Subjects $subject)
    {
        $this->isOpenDetail();
        $this->subjects = Subjects::find($subject);
        $this->subject_name = $subject->name;
        // dd($this->subject_name);
        $subject_classroom = $subject->classroomSubject;
        foreach ($subject_classroom as $key => $classroom) {
            $this->classroom_name = $classroom->name;
            $this->day = $classroom->pivot->day;
            $start_time = $classroom->pivot->start_time;
            $start = Carbon::parse($start_time);
            $this->start_time = $start->format('H:i');
            $end_time = $classroom->pivot->end_time;
            $end = Carbon::parse($end_time);
            $this->end_time = $end->format('H:i');
        }
    }
}
