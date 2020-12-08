<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstraintCustomerTransactionsToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Puji Rahayu
     */
    public function up()
    {
        Schema::table('customer_transactions', function (Blueprint $table) {
            $table->uuid('item_id')->after('customer_id');

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_transactions', function (Blueprint $table) {
            //
        });
    }
}
