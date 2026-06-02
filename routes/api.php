<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingApiController;

Route::prefix('ai')->group(function () {

    Route::get('/master-data', [BookingApiController::class, 'masterData']);

    Route::post('/check-availability', [BookingApiController::class, 'checkAvailability']);

    Route::post('/create-booking', [BookingApiController::class, 'createBooking']);

});