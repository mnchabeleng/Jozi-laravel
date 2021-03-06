<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ListingRating;

class ListingRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListingRating::factory()->count(1000)->create();
    }
}
