<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function index()
    {
        $administrations = Administration::with('subject')->get();
        return view('teacher.administrations.index', [
            'administrations' => $administrations
        ]);
    }
}
