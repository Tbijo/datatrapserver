<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouseimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouseimage', function (Blueprint $table) {
            $table->bigIncrements('mouseImgId');
            $table->string('imgName');
            $table->string('path');
            $table->string('note')->nullable();
            $table->bigInteger('mouseID');
            $table->string('deviceID');
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
        Schema::dropIfExists('mouseimage');
    }
}
