<?php

namespace Modules\HuntingBooking\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Repositories\HuntingBookingRepository;
use Illuminate\Support\Facades\Validator;
use Modules\HuntingBooking\Validators\GuideAvailabilityValidator;
use Modules\HuntingBooking\Validators\GuideAvailableForDateValidator;

class HuntingBookingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            HuntingBookingRepositoryContract::class,
            HuntingBookingRepository::class
        );
    }

    public function boot(): void
    {
        Validator::extend('guide_available', GuideAvailabilityValidator::class);
        Validator::extend('guide_available_for_date', GuideAvailableForDateValidator::class);
    }
}
