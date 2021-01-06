<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpesificationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Puji Rahayu
     */
    public function up()
    {
        Schema::create('spesification_items', function (Blueprint $table) {
            $table->id();
            $table->text('property');

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
        Schema::dropIfExists('spesification_items');
    }
}
