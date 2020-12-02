<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->streetName,
            "quantity" => $this->faker->randomNumber(3),
            "price" => "{$this->faker->currencyCode('IDR')}.  {$this->faker->randomFloat(null, 500, 100.000)}",
            "description" => $this->faker->text(50),
            "sold" => $this->faker->randomNumber(2)
        ];
    }
}
