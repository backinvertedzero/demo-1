<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'tag' => 'hunting_tour',
                'title' => 'Охотничий тур',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'shopping_tour',
                'title' => 'Shopping тур',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'medical_tour',
                'title' => 'Медицинский тур',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tour_types')->upsert(
            $params,
            ['tag'],
            ['title', 'updated_at']

        );
    }
}
