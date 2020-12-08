<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerLabelTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerLabelTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerLabelTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'customer_label_id' => CustomerLabel::factory()
        ];
    }
}
