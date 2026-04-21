<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     */
    public function index()
    {
        return view('guru_bk.appointments.index');
    }

    /**
     * Display calendar view.
     */
    public function calendar()
    {
        return view('guru_bk.appointments.calendar');
    }

    /**
     * Show a specific appointment.
     */
    public function show($appointment)
    {
        return view('guru_bk.appointments.show', compact('appointment'));
    }

    /**
     * Approve an appointment.
     */
    public function approve(Request $request, $appointment)
    {
        return back()->with('success', 'Janji konseling berhasil disetujui.');
    }

    /**
     * Reject an appointment.
     */
    public function reject(Request $request, $appointment)
    {
        return back()->with('success', 'Janji konseling ditolak.');
    }

    /**
     * Complete an appointment.
     */
    public function complete(Request $request, $appointment)
    {
        return back()->with('success', 'Janji konseling ditandai selesai.');
    }

    /**
     * Cancel an appointment.
     */
    public function cancel(Request $request, $appointment)
    {
        return back()->with('success', 'Janji konseling dibatalkan.');
    }
}
