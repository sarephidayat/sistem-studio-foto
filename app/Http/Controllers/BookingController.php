<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {

        Booking::create([

            'label_id' => $request->label_id,
            'user_id' => $request->user_id,
            'background_id' => $request->background_id,
            'kota_id' => $request->kota_id,
            'studio_id' => $request->studio_id,
            'pembayaran_id' => $request->pembayaran_id,
            'tanggal' => $request->tanggal,
            'waktu_id' => $request->waktu_id,
            'jumlah_orang' => $request->jumlah_orang,
            'nomor_telepon' => $request->nomor_telepon,

        ]);

        return redirect('/booking')
            ->with('success', 'Booking berhasil dikirim 🎉');

    }
}