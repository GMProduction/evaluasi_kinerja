<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubIndicator extends Model
{
    use HasFactory;
    protected $table = 'sub_indicator';

    protected $fillable = [
      'name',
      'indicator_id',
    ];

    public function score()
    {
        return $this->hasMany(Score::class, 'sub_indicator_id');
    }

    public function singleScore()
    {
        return $this->hasOne(Score::class, 'sub_indicator_id');
    }

    public function scoreHistory()
    {
        return $this->hasMany(ScoreHistory::class, 'sub_indicator_id');
    }

    public function indicator(){
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }
}
