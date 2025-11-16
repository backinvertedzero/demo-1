<?php

namespace Modules\HuntingBooking\Handlers\Events\HuntingBookingSucceeded;

use Modules\HuntingBooking\Models\HuntingBooking;

class AdminMailingHandler
{
    /**
     * @param int $bookingId
     * @return void
     */
    public function handle(int $bookingId): void
    {
        /** @var HuntingBooking $huntingBooking */
        $huntingBooking = HuntingBooking::find($bookingId);
        logger()->info("Тур {$huntingBooking->tour_name} забронирован");
    }
}
