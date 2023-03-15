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
        $subjects = Subject::where('user_id', auth()->user()->id)->get();
        // dd($subjects);
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
        $subjects = Subject::with(['classroomSubject', 'subjectStudent'])->where('user_id', auth()->user()->id)->get();
        $this->id_classroom = DB::table('classroom_subject')->where('subject_id', $this->id_subject)->get();
        $presences = Presence::all();
        $attendances = Attendance::all();
        $id_classroom = $subject->classroom_id;
        dd($id_classroom);
        $students = User::where('role_id', 3)->where('clasroom_id', $subject->classroom_id)->orderBy('name', 'asc')->get();
        dd($students);



        return view('teacher.presences.create', [
            'attendances'   => $attendances,
            'subject'   => $subject,
            'presences' => $presences
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
        //
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
