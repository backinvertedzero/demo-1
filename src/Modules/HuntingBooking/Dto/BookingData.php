<?php

namespace Modules\HuntingBooking\Dto;

use Carbon\Carbon;

readonly class BookingData
{
    public function __construct(
        public string $tourName,
        public string $hunterName,
        public int    $guideId,
        public Carbon $date,
        public int    $participantsCount
    )
    {
    }
}
