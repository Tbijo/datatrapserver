<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouse', function (Blueprint $table) {
            $table->bigIncrements('mouseId');
            $table->bigInteger('mouseIid');
            $table->integer('code')->nullable();
            $table->string('deviceID');
            $table->bigInteger('primeMouseID')->nullable();
            $table->bigInteger('speciesID');
            $table->bigInteger('protocolID')->nullable();
            $table->bigInteger('occasionID');
            $table->bigInteger('localityID');
            $table->integer('trapID')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->boolean('gravidity')->nullable();
            $table->boolean('lactating')->nullable();
            $table->boolean('sexActive')->nullable();
            $table->float('weight')->nullable();
            $table->boolean('recapture')->nullable();
            $table->string('captureID')->nullable();
            $table->float('body')->nullable();
            $table->float('tail')->nullable();
            $table->float('feet')->nullable();
            $table->float('ear')->nullable();
            $table->float('testesLength')->nullable();
            $table->float('testesWidth')->nullable();
            $table->integer('embryoRight')->nullable();
            $table->integer('embryoLeft')->nullable();
            $table->float('embryoDiameter')->nullable();
            $table->boolean('MC')->nullable();
            $table->integer('MCright')->nullable();
            $table->integer('MCleft')->nullable();
            $table->string('note')->nullable();
            $table->bigInteger('mouseCaught');
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
        Schema::dropIfExists('mouse');
    }
}
