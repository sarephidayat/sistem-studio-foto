<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MasterBackground;
use App\Models\MasterKota;
use App\Models\MasterPembayaran;
use App\Models\MasterStudio;
use App\Models\MasterWaktu;
use Illuminate\Http\Request;

class BookingApiController extends Controller
{
    public function masterData()
    {
        return response()->json([
            'studios' => MasterStudio::all(),
            'backgrounds' => MasterBackground::all(),
            'timeslots' => MasterWaktu::all(),
            'payments' => MasterPembayaran::all(),
            'cities' => MasterKota::all(),
        ]);
    }

    public function checkAvailability(Request $request)
    {
        $exists = Booking::where('studio_id', $request->studio_id)
            ->whereDate('tanggal', $request->tanggal)
            ->where('waktu_id', $request->waktu_id)
            ->exists();

        return response()->json([
            'available' => !$exists
        ]);
    }
}
