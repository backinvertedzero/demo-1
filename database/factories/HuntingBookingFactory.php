<?php

namespace Database\Factories;

use App\Models\Guide;
use App\Models\HuntingBooking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HuntingBooking>
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

    public function withParticipants(int $count): self
    {
        return $this->state(function (array $attributes) use ($count) {
            return [
                'participants_count' => $count,
            ];
        });
    }

    public function onDate(string $date): self
    {
        return $this->state(function (array $attributes) use ($date) {
            return [
                'date' => $date,
            ];
        });
    }

    public function upcoming(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'date' => $this->faker->dateTimeBetween('+1 day', '+1 month')->format('Y-m-d'),
            ];
        });
    }

    public function smallGroup(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'participants_count' => $this->faker->numberBetween(1, 3),
            ];
        });
    }

    public function largeGroup(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'participants_count' => $this->faker->numberBetween(4, 10),
            ];
        });
    }
}
