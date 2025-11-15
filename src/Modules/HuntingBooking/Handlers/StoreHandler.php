<?php

namespace Modules\HuntingBooking\Handlers;

use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\StoreBookingException;

readonly class StoreHandler
{
    public function __construct(private HuntingBookingRepositoryContract $bookingRepository)
    {
    }

    /**
     * @param BookingData $bookingData
     * @return int
     * @throws StoreBookingException
     */
    public function handle(BookingData $bookingData): int
    {
        return $this->bookingRepository->store($bookingData);
    }
}
