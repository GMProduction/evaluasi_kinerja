<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubIndicator extends Model
{
    use HasFactory;
    protected $table = 'sub_indicator';

    protected $fillable = [
      'name',
      'indicator_id',
      'medium',
      'bad',
      'good'
    ];

}
