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
                'primary_category_id' => 1,
                'display_name' => 'Chelsea',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'primary_category_id' => 1,
                'display_name' => 'Liverpool',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'primary_category_id' => 2,
                'display_name' => 'Chicago Bulls',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'primary_category_id' => 2,
                'display_name' => 'Boston Celtics',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'primary_category_id' => 2,
                'display_name' => 'Miami Heat',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'primary_category_id' => 2,
                'display_name' => 'Los Angeles Lakers',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'primary_category_id' => 3,
                'display_name' => 'New Jersey Devils',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'primary_category_id' => 3,
                'display_name' => 'New York Rangers',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'primary_category_id' => 3,
                'display_name' => 'Philadelphia Flyers',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'primary_category_id' => 3,
                'display_name' => 'Washington Capitals',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],   
        ])
            ->each(function ($item) {
                Team::create($item);
            });
    }
}
