<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display student's violations.
     */
    public function index()
    {
        return view('student.violation.index');
    }
}
