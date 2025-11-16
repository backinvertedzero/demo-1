<?php

namespace Modules\HuntingBooking\Listeners\HuntingBookingFailed;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\HuntingBooking\Events\HuntingBookingFailed;
use Modules\HuntingBooking\Handlers\Events\HuntingBookingFailed\AdminMailingHandler;

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
    public function handle(HuntingBookingFailed $event): void
    {
        $this->handler->handle($event->bookingData, $event->errorMessage);
    }
}
