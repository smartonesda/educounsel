<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of student's appointments.
     */
    public function index()
    {
        return view('student.appointments.index');
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        return view('student.appointments.create');
    }

    /**
     * Store a newly created appointment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|after:today',
            'keterangan' => 'nullable|string|max:500',
        ]);

        return redirect()->route('student.appointments.index')
            ->with('success', 'Permohonan janji konseling berhasil dikirim.');
    }

    /**
     * Display the specified appointment.
     */
    public function show($appointment)
    {
        return view('student.appointments.show', compact('appointment'));
    }

    /**
     * Cancel an appointment.
     */
    public function cancel(Request $request, $appointment)
    {
        return back()->with('success', 'Janji konseling berhasil dibatalkan.');
    }
}
