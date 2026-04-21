<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Display chatbot reports.
     */
    public function reports()
    {
        return view('guru_bk.chatbot.reports');
    }

    /**
     * View student chat history.
     */
    public function studentHistory($id)
    {
        return view('guru_bk.chatbot.history', compact('id'));
    }

    /**
     * Export chatbot report.
     */
    public function exportReport()
    {
        return back()->with('info', 'Fitur export laporan chatbot akan segera tersedia.');
    }

    /**
     * Shared conversations view.
     */
    public function sharedConversations()
    {
        return view('guru_bk.chatbot.shared');
    }

    /**
     * View a shared conversation.
     */
    public function viewSharedConversation($id)
    {
        return view('guru_bk.chatbot.conversation', compact('id'));
    }

    /**
     * Add notes to a conversation.
     */
    public function addNotes(Request $request, $id)
    {
        $request->validate(['notes' => 'required|string|max:1000']);
        return back()->with('success', 'Catatan berhasil ditambahkan.');
    }

    /**
     * Analytics overview.
     */
    public function analytics()
    {
        return view('guru_bk.chatbot.analytics');
    }
}
