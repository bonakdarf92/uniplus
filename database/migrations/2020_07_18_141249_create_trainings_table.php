<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->timestamp('expire')->nullable();
            $table->string('online_type');
            $table->string('website')->nullable();
            $table->string('mager');
            $table->string('gender');
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
        Schema::dropIfExists('trainings');
    }
}
