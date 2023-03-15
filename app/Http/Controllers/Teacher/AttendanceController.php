<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{Attendance, Subject};
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $subjects = Subject::where('user_id', auth()->user()->id)->get();

        return view('teacher.attendances.index', [
            'subjects'  => $subjects
        ]);
    }

    public function create()
    {

        return view('teacher.attendances.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Attendance $attendance)
    {
        //
    }
    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
