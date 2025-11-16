<?php

namespace Modules\HuntingBooking\Listeners\HuntingBookingSucceeded;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\HuntingBooking\Events\HuntingBookingSucceeded;
use Modules\HuntingBooking\Handlers\Events\HuntingBookingSucceeded\AdminMailingHandler;

class AdminMailingListener implements ShouldQueue
{

    /**
     * Create the event listener.
     */
    public function __construct(private AdminMailingHandler $handler)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(HuntingBookingSucceeded $event): void
    {
        $this->handler->handle($event->bookingId);
    }
}
