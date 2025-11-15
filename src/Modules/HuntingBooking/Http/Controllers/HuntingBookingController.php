<?php

namespace Modules\HuntingBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\HuntingBooking\Exceptions\HuntingBookingException;
use Modules\HuntingBooking\Handlers\StoreHandler;
use Modules\HuntingBooking\Http\Requests\HuntingBookingRequest;

class HuntingBookingController extends Controller
{
    /**
     * @param HuntingBookingRequest $request
     * @param StoreHandler $handler
     * @return JsonResponse
     */
    public function create(HuntingBookingRequest $request, StoreHandler $handler): JsonResponse
    {
        try {
            $handler->handle($request->makeDto());
            return new JsonResponse([
                'success' => true,
            ], 201);
        } catch (HuntingBookingException $exception) {
            return new JsonResponse([
                'success' => false,
                'errors' => [$exception->getMessage()],
            ], 500);
        }

    }
}
