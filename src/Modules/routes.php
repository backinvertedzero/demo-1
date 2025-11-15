<?php

use Illuminate\Support\Facades\Route;
use Modules\HuntingBooking\Http\Controllers\HuntingBookingController;

Route::prefix('hunting-booking')->group(function () {
    Route::post('/', [HuntingBookingController::class, 'create']);
});

