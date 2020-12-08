<?php

namespace Database\Seeders;

use App\Models\ShipProvider;
use Illuminate\Database\Seeder;

class ShippingProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipProvider::factory()->create();
    }
}
