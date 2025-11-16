<?php

namespace Modules\HuntingBooking\Validators;

use Illuminate\Contracts\Validation\Validator;
use Modules\HuntingBooking\Contracts\GuideRepositoryContract;
use Modules\HuntingBooking\Exceptions\BookingValidationException;
use Modules\HuntingBooking\Exceptions\GuideNotFoundException;

class GuideAvailabilityValidator
{
    public function __construct(private readonly GuideRepositoryContract $guideRepository) {}

    /**
     * Validate guide availability
     */
    public function validate($attribute, $value, $parameters, Validator $validator): bool
    {
        try {
            $guide = $this->guideRepository->findById($value);
        } catch (GuideNotFoundException $exception) {
            throw new BookingValidationException($exception->getMessage());
        }

        if (!$guide->is_active) {
            throw new BookingValidationException('The guide is not inactive.');
        }

        return true;
    }
}
