<?php

namespace Database\Factories;

use App\Models\ListingRating;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Listing;

class ListingRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListingRating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, count(User::all())),
            'listing_id' => rand(1, count(Listing::all())),
            'rating' => rand(1, 5)
        ];
    }
}
