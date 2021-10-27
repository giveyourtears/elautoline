<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortsFrom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_froms', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->decimal('claipeda');
            $table->decimal('minsk');
            $table->decimal('odessa');
            $table->decimal('bremer');
            $table->decimal('poti');
            $table->decimal('price_water');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('port_froms');
    }
}
