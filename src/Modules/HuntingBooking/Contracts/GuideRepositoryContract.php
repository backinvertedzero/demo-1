<?php

namespace Modules\HuntingBooking\Contracts;

interface GuideRepositoryContract
{
    /**
     * @param int $guideId
     * @return bool
     */
    public function checkAvailable(int $guideId): bool;
}
