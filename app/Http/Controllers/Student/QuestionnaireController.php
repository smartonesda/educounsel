<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\JawabanKuesioner;
use App\Models\PertanyaanKuesioner;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of available questionnaires.
     */
    public function index()
    {
        $kuesioners = Kuesioner::with('jenisKuesioner')->latest()->get();
        return view('student.questionnaire.index', compact('kuesioners'));
    }

    /**
     * Show a specific questionnaire to take.
     */
    public function show($id)
    {
        $kuesioner = Kuesioner::with('pertanyaan')->findOrFail($id);
        return view('student.questionnaire.take', compact('kuesioner'));
    }

    /**
     * Store the questionnaire answers.
     */
    public function store(Request $request, $id)
    {
        $kuesioner = Kuesioner::with('pertanyaan')->findOrFail($id);

        // Simpan jawaban
        foreach ($kuesioner->pertanyaan as $pertanyaan) {
            if ($request->has('jawaban_' . $pertanyaan->id)) {
                JawabanKuesioner::create([
                    'siswa_id'             => auth()->id(),
                    'kuesioner_id'         => $id,
                    'pertanyaan_id'        => $pertanyaan->id,
                    'jawaban'              => $request->input('jawaban_' . $pertanyaan->id),
                ]);
            }
        }

        return redirect()->route('student.questionnaire')
            ->with('success', 'Kuesioner berhasil diisi, terima kasih!');
    }
}
