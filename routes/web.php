<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\BookingController;

use App\Models\Package;
use App\Models\MasterLabel;
use App\Models\User;
use App\Models\MasterKota;
use App\Models\MasterStudio;
use App\Models\MasterBackground;
use App\Models\MasterPembayaran;
use App\Models\MasterWaktu;
use App\Models\Booking;

Route::get('/', function () {
    $packages = Package::where('is_active', true)->get();
    return view('landing', compact('packages'));
});

Route::get('/booking', function () {
    return view('booking', [
        'labels'=> MasterLabel::all(),
        'users' => User::all(),
        'kotas' => MasterKota::all(),
        'studios' => MasterStudio::all(),
        'backgrounds' => MasterBackground::all(),
        'pembayarans' => MasterPembayaran::all(),
        'waktus' => MasterWaktu::all(),
    ]);

});

Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/booking/check-slots', function (Request $request) {
    $tanggal = $request->tanggal;
    $booked = Booking::whereDate('tanggal', $tanggal)
        ->pluck('waktu_id');
    
    return response()->json($booked);
});