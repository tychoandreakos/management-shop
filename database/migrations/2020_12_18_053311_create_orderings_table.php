<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderings', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // customers
            $table->string('customer_name', 150);
            $table->string('email', 150)->nullable();
            $table->string('num_telp', 12)->nullable();
            $table->text('suggestion')->nullable();

            // item & item image
            $table->string('item_name');
            $table->string('price');
            $table->text('description');
            $table->string('image')->nullable();

            // brand & specificationItem & Categories
            $table->string('brand_name');
            $table->text('property');
            $table->text('categories');

            // ShipProvider
            $table->string('ship_provider_name');
            $table->string('ordering_number');
            $table->integer('qty_buy');
            $table->string('service_type');
            $table->string('sending_status');
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
        Schema::dropIfExists('orderings');
    }
}
