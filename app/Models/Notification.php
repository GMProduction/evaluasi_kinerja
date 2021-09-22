<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    public function score()
    {
        $this->belongsTo(Score::class, 'score_id');
    }

    public function sender()
    {
        $this->belongsTo(User::class, 'sender_id');
    }

    public function vendor()
    {
        $this->belongsTo(User::class, 'vendor_id');
    }
}
