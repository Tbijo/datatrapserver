<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecieimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specieimage', function (Blueprint $table) {
            $table->bigIncrements('specieImgId');
            $table->string('imgName');
            $table->string('path');
            $table->string('note')->nullable();
            $table->bigInteger('specieID');
            $table->bigInteger('uniqueCode');
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
        Schema::dropIfExists('specieimage');
    }
}
