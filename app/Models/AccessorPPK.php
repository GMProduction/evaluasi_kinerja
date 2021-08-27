<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessorPPK extends Model
{
    use HasFactory;

    protected $table = 'accessor_ppk';

    public function ppk()
    {
        return $this->belongsTo(PPK::class, 'ppk_id');
    }
}
