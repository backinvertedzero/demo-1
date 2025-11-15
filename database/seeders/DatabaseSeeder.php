<?php

namespace Database\Seeders;

use App\Models\Guide;
use App\Models\HuntingBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Guide::factory()
            ->count(10)
            ->create();

        $activeGuides = Guide::factory()
            ->count(5)
            ->active()
            ->create();

        Guide::factory()
            ->count(5)
            ->inactive()
            ->create();

        foreach ($activeGuides as $guide) {
            HuntingBooking::factory()
                ->count(3)
                ->forGuide($guide)
                ->create();
        }
    }
}
