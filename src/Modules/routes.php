<?php

use Illuminate\Support\Facades\Route;
use Modules\Guides\Http\Controllers\GuideController;
use Modules\HuntingBooking\Http\Controllers\HuntingBookingController;

Route::prefix('bookings')->group(function () {
    Route::post('/', [HuntingBookingController::class, 'create']);
});

Route::prefix('guides')->group(function () {
    Route::get('/', [GuideController::class, 'index']);
});
