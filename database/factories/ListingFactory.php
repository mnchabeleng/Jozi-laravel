<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(rand(3, 5), true);
        return [
            'user_id' => function() {
                return factory(User::class)->create()->id;
            },
            'location_id' => rand(1, count(Location::all())),
            'category_id' => rand(1, count(Category::all())),
            'title' => $title,
            'slug' => Str::slug($title, '-') . ' ' . Str::uuid(),
            'description' => $this->faker->paragraph(rand(10, 20), true),
            'rating' => rand(3, 5),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->streetAddress(),
            'website' =>$this->faker->domainName(),
        ];
    }
}
