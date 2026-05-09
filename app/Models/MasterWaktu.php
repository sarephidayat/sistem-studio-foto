<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterWaktu extends Model
{
    protected $table = 'master_waktu';

    protected $fillable = ['waktu'];

    protected $casts = [
        'waktu' => 'datetime:H:i',
    ];
}
