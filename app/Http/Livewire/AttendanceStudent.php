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

class AttendanceStudent extends Component
{

    public  $is_create = false,
            $is_detail = false,
            $is_edit = false,
            $open_attendance = false,
            $subject,
            $subject_name,
            $student_id,
            $students,
            $student_name,
            $id_attendance,
            $attendance,
            $attendances,
            $attendance_student,
            $classroom,
            $subjects;

    public function render()
    {
        return view('livewire.attendance-student', [
            $this->subjects = Subjects::with('teacher')->where('user_id', auth()->user()->id)->get(),
            $this->attendances = AttendancesProvide::ATTEENDANCE_PROVIDE,
            $this->attendance_student = Attendances::with(['student', 'subject'])->get(),
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

    public function openAttendance()
    {
        return $this->open_attendance = true;
    }

    public function openDetailAttendance()
    {
        $this->is_detail = true;
    }

    public function closeDetailAttendance()
    {
        $this->is_detail = false;
    }

    public function addAttendance($id_classroom)
    {
        $this->openModalCreateAttendance();

        // dd($this->attendances);
        $classroom = Classrooms::find($id_classroom);
        $this->classroom = $classroom->name;
        $this->students = Users::where('classroom_id', $id_classroom)
                                ->where('role_id', 3)->get() ?? null;

    }

    public function saveAttendance()
    {
        $this->openModalCreateAttendance();

        // dd($this->student_id);
        dd('testing save');
    }

    public function detailAttendance($id_subject)
    {
        $this->openDetailAttendance();

        $this->id_attendance = $id_subject;
    }

    public function storeAttendance()
    {
        $this->openModalCreateAttendance();

        dd($this->student_id);
    }
}
