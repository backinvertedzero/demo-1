<?php

namespace Modules\HuntingBooking\Repositories;

use Modules\HuntingBooking\Contracts\GuideRepositoryContract;
use Modules\HuntingBooking\Models\Guide;

class GuideRepository implements GuideRepositoryContract
{
    /**
     * @param int $guideId
     * @return bool
     */
    public function checkAvailable(int $guideId): bool
    {
        $model = Guide::find($guideId);

        return $model->is_active === true;
    }
}
