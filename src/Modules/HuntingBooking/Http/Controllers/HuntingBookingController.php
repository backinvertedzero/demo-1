<?php

namespace Modules\HuntingBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\HuntingBooking\Exceptions\StoreBookingException;
use Modules\HuntingBooking\Handlers\StoreHandler;
use Modules\HuntingBooking\Http\Requests\HuntingBookingRequest;

class HuntingBookingController extends Controller
{
    /**
     * @param HuntingBookingRequest $request
     * @param StoreHandler $handler
     * @return JsonResponse
     * @throws StoreBookingException
     */
    public function create(HuntingBookingRequest $request, StoreHandler $handler): JsonResponse
    {
        $bookingId = $handler->handle($request->makeDto());

        return new JsonResponse([
            'success' => true,
            'booking_id' => $bookingId
        ]);
    }
}
