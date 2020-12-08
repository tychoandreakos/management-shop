<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Puji Rahayu
     */
    public function up()
    {
        Schema::create('category_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('spesification_item_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('spesification_item_id')->references('id')->on('spesification_items')->onDelete('cascade');

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
        Schema::dropIfExists('category_transactions');
    }
}
