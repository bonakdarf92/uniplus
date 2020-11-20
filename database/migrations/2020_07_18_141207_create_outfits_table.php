<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outfits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destination');
//            $table->string('start');
            $table->string('gender');
            $table->string('car_type')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('number')->nullable();
            $table->string('date_hour')->nullable();
            $table->string('date_day')->nullable();
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
        Schema::dropIfExists('outfits');
    }
}
