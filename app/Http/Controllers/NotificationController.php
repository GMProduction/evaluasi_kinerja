<?php

namespace App\Http\Controllers;

use App\Models\Accessor;
use App\Models\AccessorPPK;
use App\Models\ClaimNotification;
use App\Models\Notification;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function notif(){
        $notif =[];
        if (Auth::user()->roles[0] == 'accessor' || Auth::user()->roles[0] == 'accessorppk' ){
            $notif = ClaimNotification::where('recipient_id','=',Auth::id())->limit(5)->get();
        }elseif (Auth::user()->roles[0] == 'vendor'){
            $data = Notification::where('vendor_id','=',Auth::id())->limit(5)->get();
            foreach ($data as $key => $d){
                $notif[$key] = $d;
                if ($d->type == 'accessor'){
                    $s = Accessor::where('user_id','=', $d->sender_id)->first();
                    Arr::add($notif[$key]['sender'],'data',$s);
                }
                if ($d->type == 'accessorppk'){
                    $s = AccessorPPK::where('user_id','=', $d->sender_id)->first();
                    Arr::add($notif[$key]['sender'],'data',$s);
                }
            }
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
        $notification = Notification::with(['sender.' . $type, 'vendor', 'score.subIndicator', 'claim'])->where('id', $id)->firstOrFail();
//        return $notification->toArray();
        return view('superuser.notification.notification-detail')->with(['data' => $notification]);
    }
}
