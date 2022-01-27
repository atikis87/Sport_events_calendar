<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrimaryCategory;
use Carbon\Carbon;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'id' => 1,
                'display_name' => 'Football',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'display_name' => 'Basketball',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        ])
            ->each(function ($item) {
                PrimaryCategory::create($item);
            });
    }
}
