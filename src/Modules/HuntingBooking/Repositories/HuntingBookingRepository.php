<?php

namespace Modules\HuntingBooking\Repositories;

use Carbon\Carbon;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\StoreBookingException;
use Modules\HuntingBooking\Models\HuntingBooking;

class HuntingBookingRepository
{

    /**
     * @param int $guideId
     * @param Carbon $date
     * @return bool
     */
    public function checkGuideForBooking(int $guideId, Carbon $date): bool
    {
        return !HuntingBooking::whereGuideId($guideId)->whereDate('date', $date)->exists();
    }

    /**
     * @param BookingData $data
     * @return int
     * @throws StoreBookingException
     */
    public function store(BookingData $data): int
    {
        $model = new HuntingBooking();
        $model->guide_id = $data->guideId;
        $model->date = $data->date;
        $model->hunter_name = $data->hunterName;
        $model->tour_name = $data->tourName;
        $model->participants_count = $data->participantsCount;
        if (!$model->save()) {
            throw new StoreBookingException('Can not save hunting booking');
        }

        return $model->id;
    }
}
