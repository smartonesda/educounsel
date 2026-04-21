<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display notifications list.
     */
    public function index()
    {
        return view('student.notifications.index');
    }

    /**
     * Get unread notifications.
     */
    public function getUnread()
    {
        return response()->json([
            'notifications' => [],
            'count' => 0,
        ]);
    }

    /**
     * Get unread notification count.
     */
    public function getUnreadCount()
    {
        return response()->json(['count' => 0]);
    }

    /**
     * Check for new notifications.
     */
    public function checkNew()
    {
        return response()->json(['has_new' => false, 'count' => 0]);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($id)
    {
        return response()->json(['success' => true]);
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        return response()->json(['success' => true]);
    }
}
