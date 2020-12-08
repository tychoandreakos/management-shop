<?php

namespace Database\Seeders;

use App\Models\ShipProvider;
use App\Models\ShipProviderTransaction;
use Illuminate\Database\Seeder;

class ShipProviderTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipProviderTransaction::factory()->has(ShipProvider::factory())->create();
    }
}
