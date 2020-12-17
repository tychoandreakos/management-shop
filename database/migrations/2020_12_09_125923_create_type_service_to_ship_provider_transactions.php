<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeServiceToShipProviderTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ship_provider_transactions', function (Blueprint $table) {
            $table->string('service_type')->after('ordering_number');
            $table->string('qty_buy')->after('service_type');
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
