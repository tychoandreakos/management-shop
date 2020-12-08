<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerTransaction;
use App\Models\Item;
use Illuminate\Database\Seeder;

class CustomerTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerTransaction::factory()
            ->has(Customer::factory())
            ->has(Item::factory())
            ->has(CustomerLabel::factory())
            ->create();
    }
}
