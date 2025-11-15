<?php

namespace Modules\HuntingBooking\Handlers;

use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\HuntingBookingException;

readonly class StoreHandler
{
    public function __construct(private HuntingBookingRepositoryContract $bookingRepository)
    {
    }

    /**
     * @param BookingData $bookingData
     * @return void
     * @throws HuntingBookingException
     */
    public function handle(BookingData $bookingData): void
    {
        $this->bookingRepository->store($bookingData);
    }
}
