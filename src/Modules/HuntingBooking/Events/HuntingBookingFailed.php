<?php

namespace Modules\HuntingBooking\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\HuntingBooking\Dto\BookingData;

readonly class HuntingBookingFailed
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(public BookingData $bookingData, public string $errorMessage)
    {
    }
}
