<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerLabelTransaction;
use Illuminate\Database\Seeder;

class CustomerLabelTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerLabelTransaction::factory()
            ->has(Customer::factory())
            ->has(CustomerLabel::factory())
            ->create();
    }
}
