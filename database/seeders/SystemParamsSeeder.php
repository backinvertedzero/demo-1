<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemParamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'tag' => 'booking_max_participants_count',
                'value' => '10',
                'description' => 'Максимальное число участников в туре',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('system_params')->upsert(
            $params,
            ['tag'],
            ['value', 'description', 'updated_at']

        );
    }
}
