<?php

namespace Database\Factories;

use App\Models\ShipProvider;
use App\Models\ShipProviderTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipProviderTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipProviderTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ship_provider_id' => ShipProvider::factory(),
            'ordering_number' => $this->faker->randomNumber(3),
            'sending_status' => $this->faker->randomLetter
        ];
    }
}
