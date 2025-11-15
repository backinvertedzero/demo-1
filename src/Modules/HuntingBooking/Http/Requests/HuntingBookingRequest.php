<?php

namespace Modules\HuntingBooking\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Rules\GuideAvailabilityRule;
use Modules\HuntingBooking\Rules\GuideAvailableForDateRule;

class HuntingBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tour_name' => [
                'required',
                'string',
                'max:255',
            ],
            'hunter_name' => [
                'required',
                'string',
                'max:255',
            ],
            'guide_id' => [
                'required',
                'exists:guides,id',
                'guide_available',
                'guide_available_for_date',
            ],
            'date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'participants_count' => [
                'required',
                'integer',
                'min:1',
                'max:10',
            ],
        ];
    }


    public function makeDto(): BookingData
    {
        return new BookingData(
            tourName: $this->tour_name,
            hunterName: $this->hunter_name,
            guideId: $this->guide_id,
            date: Carbon::make($this->date),
            participantsCount: $this->participants_count
        );
    }
}
