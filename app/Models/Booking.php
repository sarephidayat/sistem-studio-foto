<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'label_id',
        'user_id',
        'background_id',
        'studio_id',
        'pembayaran_id',
        'waktu_id',
        'kota_id',
        'jumlah_orang',
        'nomor_telepon',
    ];
    use SoftDeletes;
    public function label()
    {
        return $this->belongsTo(\App\Models\MasterLabel::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function background()
    {
        return $this->belongsTo(\App\Models\MasterBackground::class);
    }

    public function studio()
    {
        return $this->belongsTo(\App\Models\MasterStudio::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(\App\Models\MasterPembayaran::class);
    }

    public function waktu()
    {
        return $this->belongsTo(\App\Models\MasterWaktu::class);
    }

    public function kota()
    {
        return $this->belongsTo(\App\Models\MasterKota::class);
    }
}
