<?php

namespace Modules\HuntingBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\HuntingBooking\Exceptions\RepositoryException;
use Modules\HuntingBooking\Handlers\StoreHandler;
use Modules\HuntingBooking\Http\Requests\HuntingBookingRequest;

class HuntingBookingController extends Controller
{
    /**
     * @param HuntingBookingRequest $request
     * @param StoreHandler $handler
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function create(HuntingBookingRequest $request, StoreHandler $handler): JsonResponse
    {
        $handler->handle($request->makeDto());
    }
}
