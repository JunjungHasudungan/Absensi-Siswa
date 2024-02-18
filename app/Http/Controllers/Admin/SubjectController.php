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
        $pageTitle = 'Mata Pelajaran';
        $subjects = Subject::with(['teacher', 'subjectWeekday'])->get();
        // dd($subjects);
        return view('admin.subjects.index', ['subjects' => $subjects, 'pageTitle'=> $pageTitle]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        // dd('testing');
        $this->validate($request, [
            'code_subject'      => 'required|unique:subjects|string|max:25|min:3',
            'name'              => 'required|string|max:25|min:3',
            'user_id'        => 'required',
            ''
        ],[
            'code_subject.required' => 'Kode Mata Pelajaran Wajib di isi...',
            'code_subject.min'      => 'Kode Mata Pelajaran minimal 3 karakter',
            'code_subject.unique'   => 'Kode Mata Pelajaran Sudah Digunakan',
            'name.required'         => 'Nama Mata Pelajaran Wajib terisi..',
            'user_id.required'   => 'Guru Mata Pelajaran Wajib dipilih..',
        ]);
        $subject = Subject::create([
            'code_subject'      => $request->code_subject,
            'name'              => $request->name,
            'user_id'        => $request->user_id
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
