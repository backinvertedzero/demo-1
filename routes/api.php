<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingCore\GuideController;

Route::get('/guides', [GuideController::class, 'index']);
