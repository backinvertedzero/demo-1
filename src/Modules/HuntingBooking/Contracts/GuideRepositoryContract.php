<?php

namespace Modules\HuntingBooking\Contracts;

use Modules\HuntingBooking\Exceptions\GuideNotFoundException;
use Modules\HuntingBooking\Models\Guide;

interface GuideRepositoryContract
{
    /**
     * @param int $guideId
     * @return Guide
     * @throws GuideNotFoundException
     */
    public function findById(int $guideId): Guide;
}
