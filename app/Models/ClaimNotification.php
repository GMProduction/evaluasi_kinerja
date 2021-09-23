<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimNotification extends Model
{
    use HasFactory;
    protected $table = 'claim_notification';

    public function sender()
    {
        $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        $this->belongsTo(User::class, 'recipient_id');
    }
    public function notification()
    {
        $this->belongsTo(Notification::class, 'notification_id');
    }
}
