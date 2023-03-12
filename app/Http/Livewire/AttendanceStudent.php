<?php

namespace App\Http\Livewire;

use App\Models\{
        Subject as Subjects,
        Classroom as Classrooms,
        User as Users,

};
use Livewire\Component;

class AttendanceStudent extends Component
{

    public  $is_create = false,
            $is_detail = false,
            $is_edit = false,
            $subject,
            $subject_name,
            $student_name,
            $classroom_name,
            $subjects;

    public function render()
    {
        return view('livewire.attendance-student', [
            $this->subjects = Subjects::with('teacher')->where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function addAttendance($id_classroom)
    {
        $classroom = Classrooms::find($id_classroom);
        $this->classroom_name = $classroom->name;
        $student_name = Users::where('classroom_id', $id_classroom)->get() ?? null;
        dd($student_name);

    }
}
