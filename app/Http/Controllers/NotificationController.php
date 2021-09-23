<?php

namespace App\Http\Controllers;

use App\Models\ClaimNotification;
use App\Models\Notification;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function notif()
    {
        $notif = '';
        if (Auth::user()->roles[0] == 'accessor' || Auth::user()->roles[0] == 'accessorppk') {
            $notif = ClaimNotification::where('recipient_id', '=', Auth::id())->limit(5)->get();
//            $data = Vendor::
        } elseif (Auth::user()->roles[0] == 'vendor') {
            $notif = Notification::where([['vendor_id', '=', Auth::id()], ['is_active' , '=', true]])->limit(5)->get();
        }
        return $notif;
    }

    public function notifUnread()
    {
        $notif = '';
        if (Auth::user()->roles[0] == 'accessor' || Auth::user()->roles[0] == 'accessorppk') {
            $notif = ClaimNotification::where([['recipient_id', '=', Auth::id()], ['is_read', '=', 0]])->count('*');
        } elseif (Auth::user()->roles[0] == 'vendor') {
            $notif = Notification::where([['vendor_id', '=', Auth::id()], ['is_active', '=', true]])->count('*');
        }
        return $notif;
    }

    public function detailNotification($type, $id)
    {
        $notification = Notification::with(['sender.' . $type, 'vendor', 'score.subIndicator'])->where('id', $id)->firstOrFail();
        $notification->is_read = true;
        $notification->save();
//        return $notification->toArray();
        return view('superuser.notification.notification-detail')->with(['data' => $notification]);
    }
}
