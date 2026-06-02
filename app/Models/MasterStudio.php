<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterStudio extends Model
{
    protected $table = 'master_studio';

    protected $fillable = ['nama'];

    public function kota()
    {
        return $this->belongsTo(
            MasterKota::class,
            'kota_id'
        );
    }
}
