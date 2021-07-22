<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'listing_id' => function() {
                return factory(Listing::class)->create()->id;
            },
            'image' => $this->faker->imageUrl(600, 400, null, true, 'Faker')
        ];
    }
}
