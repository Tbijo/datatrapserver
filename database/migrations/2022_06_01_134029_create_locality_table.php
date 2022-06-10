<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locality', function (Blueprint $table) {
            $table->bigIncrements('localityId');
            $table->string('localityName');
            $table->float('xA')->nullable();
            $table->float('yA')->nullable();
            $table->float('xB')->nullable();
            $table->float('yB')->nullable();
            $table->integer('numSessions');
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
        Schema::dropIfExists('locality');
    }
}
