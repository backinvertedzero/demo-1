<?php

namespace Modules\HuntingBooking\Contracts;

use Carbon\Carbon;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\RepositoryException;

interface HuntingBookingRepositoryContract
{
    /**
     * @param int $guideId
     * @param Carbon $date
     * @return bool
     */
    public function checkGuideForBooking(int $guideId, Carbon $date): bool;

    /**
     * @param BookingData $data
     * @return void
     * @throws RepositoryException
     */
    public function store(BookingData $data): void;
}
