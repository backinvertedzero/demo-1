<?php

namespace Modules\HuntingBooking\Repositories;

use App\Models\HuntingBooking;
use Carbon\Carbon;
use Modules\HuntingBooking\Contracts\HuntingBookingRepositoryContract;
use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\RepositoryException;

class HuntingBookingRepository implements HuntingBookingRepositoryContract
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
     * @return void
     * @throws RepositoryException
     */
    public function store(BookingData $data): void
    {
        $model = new HuntingBooking();
        $model->guide_id = $data->guideId;
        $model->date = $data->date;
        $model->hunter_name = $data->hunterName;
        $model->tour_name = $data->tourName;
        $model->participants_count = $data->participantsCount;
        if (!$model->save()) {
            throw new RepositoryException();
        }
    }
}
