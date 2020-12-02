<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\SpesificationItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "item_id" => Item::factory(),
            "brand_id" => Brand::factory(),
            "spesification_item_id" => SpesificationItem::factory()
        ];
    }
}
