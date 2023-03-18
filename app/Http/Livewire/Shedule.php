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
            $start_time,
            $end_time,
            $subject_name;
    public function render()
    {
        return view('livewire.shedule', [
            $this->subjects = Subjects::with(['teacher', 'classroomSubject'])->where('user_id', auth()->user()->id)->get()
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
