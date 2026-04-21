<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    /**
     * Display materi list for students.
     */
    public function studentIndex()
    {
        $materis = Materi::latest()->paginate(12);

        return view('student.materi.index', compact('materis'));
    }

    /**
     * Show a specific materi for student.
     */
    public function studentShow(Materi $materi)
    {
        return view('student.materi.show', compact('materi'));
    }
}
