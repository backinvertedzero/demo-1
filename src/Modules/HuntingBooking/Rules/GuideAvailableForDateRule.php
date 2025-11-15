<?php

namespace Modules\HuntingBooking\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;

class GuideAvailableForDateRule implements ValidationRule, DataAwareRule
{
    private array $data;

    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $bookingRepository = app(HuntingBookingRepositoryContract::class);
        $guidId = $value;
        $date = Carbon::make($this->data['date']);
        $check = $bookingRepository->checkGuideForBooking($guidId, $date);
        if (!$check) {
            $fail('The guide already has reservations for the same date.');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param array<string, mixed> $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
