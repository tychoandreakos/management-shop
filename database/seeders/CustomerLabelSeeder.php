<?php

namespace Database\Seeders;

use App\Models\CustomerLabel;
use Illuminate\Database\Seeder;

class CustomerLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerLabel::factory()->create();
    }
}
