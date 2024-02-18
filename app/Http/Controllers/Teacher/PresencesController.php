<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{
        User,
        Attendance,
        Presence,
        Subject,
    };
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresencesController extends Controller
{
    public  $id_subject,
            $id_classroom,
            $homeTeacher_id,
            $homeTeacher,
            $subject_id,
            $subject,
            $classroom,
            $created_at,
            $presence;

    public function historiesIndex()
    {
        return view('teacher.presences.historiesIndex',[

            'presences'     => Presence::with(['subject', 'teacher', 'student'])

            ->where('teacher_id', auth()->user()->id)->groupBy('created_at')->latest()->get()
        ]);
    }

    public function index()
    {
        $pageTitle = 'Absensi';
        $subjects = Subject::with(['classroom', 'classroomSubject', 'presence'], function($query){

            $query->where('user_id', auth()->user()->id);

        })->where('user_id', auth()->user()->id)->get();

        foreach ($subjects as $subject) {
           $this->homeTeacher_id = $subject->classroom->user_id;
           $this->classroom = $subject->classroom->name;
        }

        $presences = Presence::with(['subject'], function($query){

            $query->where('subject_id', $this->subject_id)->get();

        })->get();

        return view('teacher.presences.index',[
            'pageTitle'         => $pageTitle,
            'subjects'          => $subjects,
            'presences'         => $presences,
            'homeTeacher_id'    => $this->homeTeacher_id,
            'classroom'         => $this->classroom,
        ]);
    }

    public function CoreIndex(Subject $subject)
    {
        dd('core Index');
    }

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

    public function store(Request $request, Subject $subject)
    {
        foreach($request->presences as $person)
        {
            Presence::create($person);
        }

        return redirect('teacher/historiesPresences');
    }

    public function show(Presence $presence, Subject $subject)
    {
        return view('teacher.presences.show', [
            'presences'     => $presence->where('teacher_id', auth()->user()->id)->get(),
        ]);
    }

    public function historyPresenceSubject(Presence $presence, Subject $subject)
    {

        $this->subject_id = $subject->id;

        $presences = Presence::with(['subject', 'classroom', 'student', 'attendance'], function($query){

            $query->where('subject_id', $this->subject_id)->get();

        })->where('subject_id', $this->subject_id)->latest()->get();

        foreach($presences as $presence){
            $this->classroom = $presence->classroom;
            $this->subject = $presence->subject;
            $this->presence = $presence;
            }

            return view('teacher.presences.show', [
                'created_at'    => $this->created_at,
                'presence'      => $this->presence,
                'presences'     => $presences,
                'classroom'     => $this->classroom,
                'subject'       => $subject
            ]);
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
