<?php

namespace App\Http\Controllers;

use App\Models\ClaimNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function notif(){
        $notif ='';
        if (Auth::user()->roles[0] == 'accessor' || Auth::user()->roles[0] == 'accessorppk' ){
            $notif = ClaimNotification::where('recipient_id','=',Auth::id())->limit(5)->get();
        }elseif (Auth::user()->roles[0] == 'vendor'){
            $notif = Notification::with('vendor')->where('vendor_id','=',Auth::id())->limit(5)->get();
        }
        return $notif;
    }

    public function notifUnread(){
        $notif = '';
        if (Auth::user()->roles[0] == 'accessor' || Auth::user()->roles[0] == 'accessorppk' ){
            $notif = ClaimNotification::where([['recipient_id','=',Auth::id()],['is_read','=',0]])->count('*');
        }elseif (Auth::user()->roles[0] == 'vendor'){
            $notif = Notification::where([['vendor_id','=',Auth::id()],['is_read','=',0]])->count('*');
        }
        return $notif;
    }

    public function detailNotification($id)
    {
        $notification = Notification::with(['sender', 'vendor', 'score'])->where('id', $id)->firstOrFail();
//        return $notification->toArray();
        return view('superuser.notification.notification-detail');
    }
}
