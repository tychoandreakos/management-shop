<?php

namespace Database\Factories;

use App\Models\SpesificationItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpesificationItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpesificationItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "property" => $this->faker->name
        ];
    }
}
