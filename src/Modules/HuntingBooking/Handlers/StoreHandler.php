<?php

namespace Modules\HuntingBooking\Handlers;

use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\RepositoryException;

readonly class StoreHandler
{
    public function __construct(private HuntingBookingRepositoryContract $bookingRepository)
    {
    }

    /**
     * @param BookingData $bookingData
     * @return void
     * @throws RepositoryException
     */
    public function handle(BookingData $bookingData): void
    {
        $this->bookingRepository->store($bookingData);
    }
}
