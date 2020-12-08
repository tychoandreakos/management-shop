<?php

namespace Database\Factories;

use App\Models\ShipProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipProvider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name
        ];
    }
}
