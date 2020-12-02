<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstaintItemTransactionsToSpesificationItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Puji Rahayu
     */
    public function up()
    {
        Schema::table('item_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('spesification_item_id')->after('brand_id');

            $table->foreign('spesification_item_id')->references('id')->on('spesification_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_transactions', function (Blueprint $table) {
            //
        });
    }
}
