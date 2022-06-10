<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccasionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occasion', function (Blueprint $table) {
            $table->bigIncrements('occasionId');
            $table->integer('occasion');
            $table->string('deviceID');
            $table->bigInteger('localityID');
            $table->bigInteger('sessionID');
            $table->bigInteger('methodID');
            $table->bigInteger('methodTypeID');
            $table->bigInteger('trapTypeID');
            $table->bigInteger('envTypeID')->nullable();
            $table->bigInteger('vegetTypeID')->nullable();
            $table->boolean('gotCaught');
            $table->integer('numTraps');
            $table->integer('numMice');
            $table->float('temperature')->nullable();
            $table->string('weather')->nullable();
            $table->string('leg');
            $table->string('note')->nullable();
            $table->bigInteger('occasionStart');
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
        Schema::dropIfExists('occasion');
    }
}
