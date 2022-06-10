<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccasionimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occasionimage', function (Blueprint $table) {
            $table->bigIncrements('occasionImgId');
            $table->string('imgName');
            $table->string('path');
            $table->string('note')->nullable();
            $table->bigInteger('occasionID');
            $table->string('deviceID');
            $table->bigInteger('imageCreated');
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
        Schema::dropIfExists('occasionimage');
    }
}
