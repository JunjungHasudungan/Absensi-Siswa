<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('teacher.attendances.index');
    }

    public function create()
    {
        //
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
