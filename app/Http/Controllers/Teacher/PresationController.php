<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{
        Presation,
        Subject,
    };
use Illuminate\Http\Request;

class PresationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::where('user_id', auth()->user()->id)->get();
        return view('teacher.presations.historiesIndex',[
            'subjects'  => $subjects
        ]);
    }

    public function CoreIndex(Subject $subject)
    {
        return view('teacher.presations.index',[
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

        // dd($subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presation  $presation
     * @return \Illuminate\Http\Response
     */
    public function show(Presation $presation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presation  $presation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presation $presation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presation  $presation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presation $presation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presation  $presation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presation $presation)
    {
        //
    }
}
