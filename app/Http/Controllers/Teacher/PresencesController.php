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
    public  $id_subject,
            $id_classroom,
            $subject_id,
            $subject,
            $classroom,
            $created_at,
            $presence;

    public function historiesIndex()
    {
        return view('teacher.presences.historiesIndex',[
            'presences'     => Presence::where('teacher_id', auth()->user()->id)->groupBy('created_at')->latest()->get()
        ]);
    }

    public function index()
    {
        $presences = Presence::where('teacher_id', auth()->user()->id)->get();
        $subjects = Subject::with('classroomSubject')->where('user_id', auth()->user()->id)->get();
        return view('teacher.presences.index',[
            'subjects'  => $subjects,
            'presences' => $presences,
        ]);

        // dd($presences);
    }

    public function CoreIndex(Subject $subject)
    {
        dd('core Index');
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
        // presences = request from blade
        foreach($request->presences as $person)
        {
            Presence::create($person);
        }

        return redirect('teacher/historiesPresences');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $Presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence, Subject $subject)
    {
        // dd('Testing Halaman Show');

        return view('teacher.presences.show', [
            'presences'     => $presence->where('teacher_id', auth()->user()->id)->get(),
        ]);
    }

    public function historyPresenceSubject(Presence $presence, Subject $subject)
    {

        $this->subject_id = $subject->id;
        // $presence = Presence::select('created_at')->where('subject_id', $this->subject_id)->get('created_at');
        // foreach ($presence as $key => $value) {
        //     $created_at = $value->created_at;
        // }
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
