<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\SpesificationItem;
use Illuminate\Database\Seeder;

class ItemTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemTransaction::factory()
            ->has(Item::factory())
            ->has(Brand::factory())
            ->has(SpesificationItem::factory())
            ->create();
    }
}
