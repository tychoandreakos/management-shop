<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTransaction;
use App\Models\SpesificationItem;
use Illuminate\Database\Seeder;

class CategoryTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryTransaction::factory()->has(Category::factory())->has(SpesificationItem::factory())->create();
    }
}
