<?php

namespace Modules\HuntingBooking\Validators;

use App\Models\Guide;
use Illuminate\Contracts\Validation\Validator;
use Modules\HuntingBooking\Exceptions\BookingValidationException;

class GuideAvailabilityValidator
{
    /**
     * Validate guide availability
     */
    public function validate($attribute, $value, $parameters, Validator $validator): bool
    {
        /** @var Guide $guide */
        $guide = Guide::find($value);

        if (!$guide) {
            throw new BookingValidationException('The guide is not found.');
        }

        if (!$guide->is_active) {
            throw new BookingValidationException('The guide is not inactive.');
        }

        return true;
    }
}
