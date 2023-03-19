<?php

namespace App\Http\Livewire;

use App\Models\{
        Subject as Subjects,
        Classroom as Classrooms,
        User as Users,
        Attendance as Attendances,

};
use App\Helpers\AttendanceProvide as AttendancesProvide;
use Livewire\Component;
use App\Models\{
        Classroom,
        Presence,
    };

use Carbon\Carbon;

class AttendanceStudent extends Component
{

    public  $date,
            $subject_name,
            $presences,
            $presence,
            $description,
            $classroom;

    public function render()
    {
            $presences = Presence::where('student_id', auth()->user()->id)->get();

            foreach ($presences as $presence) {
                $this->classroom = $presence->classroom->name;
                $this->subject_name = $presence->subject->name;
                $this->date = Carbon::parse($presence->created_at)->translatedFormat('d F Y');
                $this->description = $presence->attendance->description;

            }

        return view('livewire.attendance-student', [
            $this->presences = Presence::where('student_id', auth()->user()->id)->latest()->get(),
        ]);
    }

}
