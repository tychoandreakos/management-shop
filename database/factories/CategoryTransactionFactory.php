<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryTransaction;
use App\Models\SpesificationItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "category_id" => Category::factory(),
            "spesification_item_id" => SpesificationItem::factory(),
        ];
    }
}
