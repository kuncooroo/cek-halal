<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin; 

class NotificationController extends Controller
{
    public function read($id)
    {
        /** @var Admin $user */
        $user = auth()->guard('admin')->user();

        if (!$user) {
            abort(403, 'Unauthorized action.');
        }

        $notification = $user->notifications()->findOrFail($id);
        
        $notification->markAsRead();

        $link = $notification->data['link'] ?? route('admin.dashboard');

        return redirect($link);
    }

    public function markAllRead()
    {
        /** @var Admin $user */
        $user = auth()->guard('admin')->user();

        if (!$user) {
            abort(403, 'Unauthorized action.');
        }

        $user->unreadNotifications->markAsRead();

        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
}