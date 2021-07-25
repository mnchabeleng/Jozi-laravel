<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        $categories = ['Hotels & Guest Houeses', 'Arts & Culture', 'Adventure', 'Bars & Restaurants'];
        foreach($categories as $category)
        {
            Category::create([
                'name' => $category,
                'image' => "img/category/$count.jpg"
            ]);

            $count++;
        }
    }
}
