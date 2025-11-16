<?php

namespace Modules\HuntingBooking\Handlers\Events\HuntingBookingFailed;

use Modules\HuntingBooking\Dto\BookingData;

class AdminMailingHandler
{
    public function handle(BookingData $bookingData, string $errorMessage): void
    {
        logger()->error("Тур {$bookingData->tourName} не забронирован по причине $errorMessage");
    }
}
