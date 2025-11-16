<?php

namespace Modules\HuntingBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\HuntingBooking\Events\HuntingBookingFailed;
use Modules\HuntingBooking\Events\HuntingBookingSucceeded;
use Modules\HuntingBooking\Exceptions\BookingValidationException;
use Modules\HuntingBooking\Exceptions\StoreBookingException;
use Modules\HuntingBooking\Handlers\Http\StoreHandler;
use Modules\HuntingBooking\Http\Requests\HuntingBookingRequest;

class HuntingBookingController extends Controller
{
    /**
     * @param HuntingBookingRequest $request
     * @param StoreHandler $handler
     * @return JsonResponse
     * @throws BookingValidationException
     */
    public function create(HuntingBookingRequest $request, StoreHandler $handler): JsonResponse
    {
        $bookingData = $request->makeDto();

        $handler->validateBooking($bookingData);

        try {
            $bookingId = $handler->handle($bookingData);
            HuntingBookingSucceeded::dispatch($bookingId);
            return new JsonResponse([
                'success' => true,
                'booking_id' => $bookingId,
            ]);
        } catch (StoreBookingException $exception) {
            HuntingBookingFailed::dispatch($bookingData, $exception->getMessage());
            return new JsonResponse([
                'success' => false,
                'errors' => [
                    'Error. Please try again later.',
                ],
            ], 500);
        }

    }
}
