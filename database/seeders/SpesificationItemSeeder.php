<?php

namespace Database\Seeders;

use App\Models\SpesificationItem;
use Illuminate\Database\Seeder;

class SpesificationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpesificationItem::factory()->create();
    }
}
