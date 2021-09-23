<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\ClaimNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ClaimNotificationController extends CustomController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        try {
            $notification = Notification::with(['score.subIndicator'])->find($this->postField('id'));
            if (!$notification) {
                return response()->json(['msg' => 'Notifikasi Tidak Di Temukan...'], 202);
            }
            $claimId = $this->postField('claim_id');
            if(!$claimId){
                $senderId = Auth::id();
                $files = \request()->file('file');
                $extension = $files->getClientOriginalExtension();
                $name = $this->uuidGenerator() . '.' . $extension;
                $stringImg = '/files/' . $name;
                $this->uploadImage('file', $name, 'filesUpload');

                $claim = new ClaimNotification();
                $claim->title = 'Pesan Sanggahan';
                $claim->description = 'Pesan Sanggahan Terhadap Penilaian Indicator ' . $notification->score->subIndicator->name . '.';
                $claim->text = $this->postField('description');
                $claim->file = $stringImg;
                $claim->sender_id = $senderId;
                $claim->recipient_id = $notification->sender_id;
                $claim->notification_id = $notification->id;
                $claim->save();
                return response()->json(['msg' => 'success'], 200);
            }else{
                $claim = ClaimNotification::find($claimId);
                $files = \request()->file('file');
                if($files){
                    $extension = $files->getClientOriginalExtension();
                    $name = $this->uuidGenerator() . '.' . $extension;
                    $stringImg = '/files/' . $name;
                    $this->uploadImage('file', $name, 'filesUpload');
                    $claim->file = $stringImg;
                }
                $claim->text = $this->postField('description');
                $claim->save();
                return response()->json(['msg' => 'success'], 200);
            }

        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..'], 500);
        }
    }
}