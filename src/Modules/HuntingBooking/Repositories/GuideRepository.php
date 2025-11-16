<?php

namespace Modules\HuntingBooking\Repositories;

use Modules\HuntingBooking\Contracts\GuideRepositoryContract;
use Modules\HuntingBooking\Exceptions\GuideNotFoundException;
use Modules\HuntingBooking\Models\Guide;

class GuideRepository implements GuideRepositoryContract
{
    /**
     * @param int $guideId
     * @return Guide
     * @throws GuideNotFoundException
     */
    public function findById(int $guideId): Guide
    {
        $model = Guide::find($guideId);

        if ($model === null) {
            throw new GuideNotFoundException('Guide not found by id: ' . $guideId);
        }

        return $model;
    }
}
