<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Carbon\Carbon;
class TeamSeeder extends Seeder
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
                'primary_category_id' => 1,
                'display_name' => 'FC Barcelona',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'primary_category_id' => 1,
                'display_name' => 'Manchester United',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'primary_category_id' => 2,
                'display_name' => 'Chicago Bulls',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        ])
            ->each(function ($item) {
                Team::create($item);
            });
    }
}
