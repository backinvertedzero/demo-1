<?php

namespace Modules\HuntingBooking\Rules;

use App\Models\Guide;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class GuideAvailabilityRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var Guide $guide */
        $guide = Guide::find($value);
        if (!$guide) {
            $fail('The given data was invalid.');
        } else {
            if (!$guide->is_active) {
                $fail('The guide is not inactive.');
            }
        }
    }
}
