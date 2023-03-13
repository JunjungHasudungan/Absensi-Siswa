<?php

namespace App\Http\Livewire;

use App\Models\{
        Subject as Subjects,
        Classroom as Classrooms,
        User as Users,

};
use App\Helpers\AttendanceProvide as AttendancesProvide;
use Livewire\Component;

class AttendanceStudent extends Component
{

    public  $is_create = false,
            $is_detail = false,
            $is_edit = false,
            $subject,
            $subject_name,
            $students,
            $attendances,
            $classroom_name,
            $subjects;

    public function render()
    {
        return view('livewire.attendance-student', [
            $this->subjects = Subjects::with('teacher')->where('user_id', auth()->user()->id)->get(),
            $this->attendances = AttendancesProvide::ATTEENDANCE_PROVIDE,
        ]);
    }

    public function openModalCreateAttendance()
    {
        return $this->is_create = true;
    }
    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function addAttendance($id_classroom)
    {
        $this->openModalCreateAttendance();

        $classroom = Classrooms::find($id_classroom);
        $this->classroom_name = $classroom->name;
        $this->students = Users::where('classroom_id', $id_classroom)->get() ?? null;
    }

    public function storeAttendance()
    {
        dd('Testing store data absensi');
    }
}
