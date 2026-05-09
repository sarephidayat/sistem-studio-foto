<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPembayaran extends Model
{
    protected $table = 'master_pembayaran';

    protected $fillable = ['nama'];
}
