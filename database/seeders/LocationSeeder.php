<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Benoni', 'Boksburg', 'Brakpan', 'Carletonville', 'Germiston', 'Johannesburg', 'Krugersdorp', 'Pretoria', 'Randburg', 'Randfontein', 'Roodepoort', 'Soweto', 'Springs', 'Vanderbijlpark', 'Vereeniging'];
        foreach($locations as $location)
        {
            Location::create([
                'name' => $location,
                'slug' => Str::slug($location, '-')   . '-' . Str::uuid(),
            ]);
        }
    }
}
