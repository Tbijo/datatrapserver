<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specie', function (Blueprint $table) {
            $table->bigIncrements('specieId');
            $table->string('speciesCode');
            $table->string('fullName');
            $table->string('synonym')->nullable();
            $table->string('authority')->nullable();
            $table->string('description')->nullable();
            $table->boolean('isSmallMammal');
            $table->integer('upperFingers')->nullable();
            $table->float('minWeight')->nullable();
            $table->float('maxWeight')->nullable();
            $table->float('bodyLength')->nullable();
            $table->float('tailLength')->nullable();
            $table->float('feetLengthMin')->nullable();
            $table->float('feetLengthMax')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('specie');
    }
}
