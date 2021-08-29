<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('port_id');
            $table->integer('type_id');
            $table->integer('city_id');
            $table->integer('price_type');
            $table->integer('price_city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_prices');
    }
}
