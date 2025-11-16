<?php

namespace Modules\HuntingBooking\Handlers;

use Modules\HuntingBooking\Dto\BookingData;
use Modules\HuntingBooking\Exceptions\BookingValidationException;
use Modules\HuntingBooking\Exceptions\StoreBookingException;
use Modules\HuntingBooking\Repositories\GuideRepository;
use Modules\HuntingBooking\Repositories\HuntingBookingRepository;

readonly class StoreHandler
{
    public function __construct(
        private HuntingBookingRepository $bookingRepository,
        private GuideRepository $guideRepository,
    )
    {
    }

    /**
     * @param BookingData $bookingData
     * @return int
     * @throws StoreBookingException
     */
    public function handle(BookingData $bookingData): int
    {
        return $this->bookingRepository->store($bookingData);
    }

    /**
     * @param $bookingData
     * @return void
     * @throws BookingValidationException
     */
    public function validateBooking($bookingData)
    {
        $this->validateGuideAvailability($bookingData->guideId);
        $this->validateParticipantsCount($bookingData->participantsCount);
        $this->validateGuideReservations($bookingData->guideId, $bookingData->date);
    }

    protected function validateGuideAvailability($guideId)
    {
        if (!$this->guideRepository->checkAvailable($guideId)) {
            throw new BookingValidationException("Guide {$guideId} is not available.");
        }
    }

    protected function validateParticipantsCount($participantsCount)
    {
        if ($participantsCount > 10) {
            throw new BookingValidationException("The number of participants must be least than 10.");
        }
    }

    protected function validateGuideReservations($guideId, $date)
    {
        if (!$this->bookingRepository->checkGuideForBooking($guideId, $date)) {
            throw new BookingValidationException("The guide already has reservations for the same date.");
        }
    }
}
