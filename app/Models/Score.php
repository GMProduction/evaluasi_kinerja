<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'evaluator_id',
        'sub_indicator_id',
        'score',
        'text',
    ];
}
