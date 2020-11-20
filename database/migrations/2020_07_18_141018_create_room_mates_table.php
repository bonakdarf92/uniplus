<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomMatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_mates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('room_count')->nullable();
            $table->integer('measure')->nullable();
            $table->integer('need_count')->nullable();
            $table->integer('real_count')->nullable();
            $table->bigInteger('daily_payment')->nullable();
            $table->bigInteger('max_prepayment')->nullable(); //rahn
            $table->bigInteger('adver_id')->unsigned();
            $table->foreign('adver_id')->references('id')->on('advertises')->onDelete('cascade');
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
        Schema::dropIfExists('room_mates');
    }
}
