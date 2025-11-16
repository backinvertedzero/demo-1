<?php

namespace Modules\HuntingBooking\Events;

use Illuminate\Foundation\Events\Dispatchable;

readonly class HuntingBookingSucceeded
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(public int $bookingId)
    {
    }
}
