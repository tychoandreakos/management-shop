<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstraintShipProvidersTransactionToItemAndCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ship_provider_transactions', function (Blueprint $table) {
            $table->uuid('customer_id')->after('ship_provider_id');
            $table->uuid('item_id')->after('ship_provider_id');

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ship_provider_transactions', function (Blueprint $table) {
            //
        });
    }
}
