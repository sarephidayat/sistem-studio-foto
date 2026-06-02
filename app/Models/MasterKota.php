<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKota extends Model
{
    protected $table = 'master_kota';
    protected $fillable = ['nama'];
    public function studios()
    {
        return $this->hasMany(
            MasterStudio::class,
            'kota_id'
        );
    }
}
