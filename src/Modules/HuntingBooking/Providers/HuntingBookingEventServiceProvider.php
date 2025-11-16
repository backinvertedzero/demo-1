<?php

namespace Modules\HuntingBooking\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\HuntingBooking\Events\HuntingBookingFailed;
use Modules\HuntingBooking\Events\HuntingBookingSucceeded;
use Modules\HuntingBooking\Listeners\HuntingBookingFailed\AdminMailingListener as FailedAdminMailingListener;
use Modules\HuntingBooking\Listeners\HuntingBookingSucceeded\AdminMailingListener as SucceededAdminMailingListener;

class HuntingBookingEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        HuntingBookingSucceeded::class => [
            SucceededAdminMailingListener::class,
        ],
        HuntingBookingFailed::class => [
            FailedAdminMailingListener::class,
        ]
    ];

}
