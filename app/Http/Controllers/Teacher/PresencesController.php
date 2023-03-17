<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{
        User,
        Attendance,
        Presence,
        Subject,
    };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresencesController extends Controller
{
    public $id_subject, $id_classroom;

    public function index()
    {
        $subjects = Subject::with('classroomSubject')->where('user_id', auth()->user()->id)->get();
        return view('teacher.presences.index',[
            'subjects'  => $subjects
        ]);
    }

    public function CoreIndex(Subject $subject)
    {
        return view('teacher.presences.index',[
            'subjects'  => $subject::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        $students = User::where('classroom_id', $subject->classroom_id)
                        ->where('role_id', 3)->orderBy('name', 'asc')->get();

        $attendances = Attendance::all();

        return view('teacher.presences.create', [
            'subject'       => $subject,
            'students'      => $students,
            'attendances'   => $attendances,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subject $subject)
    {
        // dd($request->presences);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $Presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $Presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $Presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $Presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
