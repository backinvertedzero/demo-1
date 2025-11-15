<?php

namespace App\Http\Controllers\BookingCore;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuideResource;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GuideController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $guides = Guide::active()->get();

        return GuideResource::collection($guides);
    }
}
