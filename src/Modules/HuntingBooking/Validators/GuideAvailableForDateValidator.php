<?php

namespace Modules\HuntingBooking\Validators;


use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Exceptions\BookingValidationException;

class GuideAvailableForDateValidator
{
    public function validate($attribute, $value, $parameters, Validator $validator): bool
    {
        $data = $validator->getData();

        $date = Carbon::make($data['date'] ?? null);

        $bookingRepository = app(HuntingBookingRepositoryContract::class);
        $isAvailable = $bookingRepository->checkGuideForBooking($value, $date);

        if (!$isAvailable) {
            throw new BookingValidationException('The guide already has reservations for the same date.');
        }

        return true;
    }
}
