<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('needtype');
            $table->string('title');
            $table->string('slug');
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->integer('counter')->default(1);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('city');
            $table->string('university');
//            $table->boolean('connection');
            $table->string('answer_time')->nullable();
            $table->string('fake_id');
            $table->boolean('status')->default(false);
            $table->integer('immidiatetype')->default(0);
            $table->boolean('connection')->default(true);
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
        Schema::dropIfExists('advertises');
    }
}
