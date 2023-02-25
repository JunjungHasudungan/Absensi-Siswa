<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Subject,
        User,
    };
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::with(['teacher', 'subjectWeekday'])->get();
        // dd($subjects);
        return view('admin.subjects.index', ['subjects' => $subjects]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        // dd('testing');
        $subject = Subject::create([
            'code_subject'      => $request->code_subject,
            'name'              => $request->name,
            'teacher_id'        => $request->teacher_id
        ]);


        foreach ($request->classroomSubject as $classroom) {
            $subject->classroomSubject()->attach($classroom['classroom_id']);
        }

        dd('berhasil ditambahkan..');
    }

    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
