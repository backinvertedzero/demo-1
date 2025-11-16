<?php

namespace Database\Factories;

use Modules\Guides\Models\Guide;
use Modules\HuntingBooking\Models\HuntingBooking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\HuntingBooking\Models\HuntingBooking>
 */
class HuntingBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_name' => $this->faker->randomElement([
                'Elk Hunting Expedition',
                'Bear Tracking Adventure',
                'Deer Stalking Tour',
                'Wild Boar Hunt',
                'Moose Hunting Experience'
            ]),
            'hunter_name' => $this->faker->name(),
            'guide_id' => Guide::factory(),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d'),
            'participants_count' => $this->faker->numberBetween(1, 10),
        ];
    }

    protected $model = HuntingBooking::class;

    public function forGuide(Guide $guide): self
    {
        return $this->state(function (array $attributes) use ($guide) {
            return [
                'guide_id' => $guide->id,
            ];
        });
    }
}
