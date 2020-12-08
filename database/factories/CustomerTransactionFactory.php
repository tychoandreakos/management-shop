<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerTransaction;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "customer_id" => Customer::factory(),
            "item_id" => Item::factory(),
            "customer_label_id" => CustomerLabel::factory(),
        ];
    }
}
