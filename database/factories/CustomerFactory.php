<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'num_telp' => $this->faker->phoneNumber,
            'suggestion' => $this->faker->text(50),
            'created_at' => $this->faker->dateTimeBetween('+3 week', '+3 month')
        ];
    }
}
