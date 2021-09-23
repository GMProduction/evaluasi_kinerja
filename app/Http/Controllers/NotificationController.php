<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function notif(){
        $notif = Notification::where('vendor_id','=',Auth::id())->limit(5)->get();
        return $notif;
    }

    public function notifUnread(){
        $notif = Notification::where([['vendor_id','=',Auth::id()],['is_read','=',0]])->count('*');
        return $notif;
    }

    public function detailNotification($id)
    {
        $notification = Notification::with(['sender', 'vendor', 'score'])->where('id', $id)->firstOrFail();
        return $notification->toArray();
        return view('superuser.notification.notification-detail');
    }
}
