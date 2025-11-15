<?php

namespace Modules\HuntingBooking\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Repositories\HuntingBookingRepository;

class HuntingBookingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            HuntingBookingRepositoryContract::class,
            HuntingBookingRepository::class
        );
    }
}
