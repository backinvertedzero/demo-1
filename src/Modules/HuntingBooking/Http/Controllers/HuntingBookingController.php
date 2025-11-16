<?php

namespace Modules\HuntingBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\HuntingBooking\Exceptions\BookingValidationException;
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
     * @throws BookingValidationException
     */
    public function create(HuntingBookingRequest $request, StoreHandler $handler): JsonResponse
    {
        $bookingData = $request->makeDto();

        $handler->validateBooking($bookingData);
        $bookingId = $handler->handle($bookingData);

        return new JsonResponse([
            'success' => true,
            'booking_id' => $bookingId
        ]);
    }
}
