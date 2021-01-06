<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product_name')->unique();
            $table->integer('quantity');
            $table->string('price', 100);
            $table->integer('sold');

            $table->string('brand_name');
            $table->string('location')->nullable();
            $table->string('founded')->nullable();

            $table->text('category')->nullable();
            $table->text('specification_item')->nullable();

            $table->string('product_image')->nullable();

            $table->text('dectiprion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
