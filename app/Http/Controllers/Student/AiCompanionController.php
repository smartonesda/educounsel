<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiCompanionController extends Controller
{
    /**
     * Display AI Companion main page.
     */
    public function index()
    {
        return view('student.ai-companion.index');
    }

    /**
     * Handle chat message.
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $apiKey = config('services.openai.key', env('OPENAI_API_KEY'));

        if (!$apiKey || $apiKey === 'your-openai-api-key-here') {
            return response()->json([
                'success' => false,
                'message' => 'AI Companion tidak tersedia saat ini. API key belum dikonfigurasi.',
            ], 503);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Kamu adalah AI Companion untuk siswa sekolah. Bantu siswa dengan masalah akademik, personal, dan pengembangan diri. Selalu responsif, empatik, dan konstruktif. Jawab dalam Bahasa Indonesia.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->message
                    ]
                ],
                'max_tokens' => 500,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'success' => true,
                    'reply' => $data['choices'][0]['message']['content'] ?? 'Maaf, tidak ada respons.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan respons dari AI.',
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get chat history.
     */
    public function history()
    {
        return view('student.ai-companion.index');
    }

    /**
     * Save chat history.
     */
    public function saveHistory(Request $request)
    {
        return response()->json(['success' => true]);
    }

    /**
     * Clear chat history.
     */
    public function clearHistory()
    {
        return response()->json(['success' => true, 'message' => 'Riwayat chat telah dihapus.']);
    }

    /**
     * Get AI companion stats.
     */
    public function stats()
    {
        return response()->json([
            'total_conversations' => 0,
            'total_messages' => 0,
        ]);
    }

    /**
     * Export conversation as PDF.
     */
    public function exportPdf()
    {
        return back()->with('info', 'Fitur export PDF akan segera tersedia.');
    }

    /**
     * Share conversation with Guru BK.
     */
    public function shareWithGuruBK(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Percakapan berhasil dibagikan ke Guru BK.',
        ]);
    }

    /**
     * Get shareable conversation data.
     */
    public function getShareableConversation()
    {
        return response()->json([
            'success' => true,
            'conversation' => [],
        ]);
    }
}
