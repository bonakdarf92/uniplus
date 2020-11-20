<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('university')->nullable();
            $table->string('mager')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('budget')->default(0);
            $table->integer('role')->default(1);
            $table->boolean('isverified')->default(false);
            $table->string('telegram')->nullable();
            $table->integer('otp')->default(1);
            $table->timestamp('expire_otp')->nullable();
            $table->integer('total_score')->default(0);
            $table->string('identify_id')->unique()->nullable();
            $table->integer('award_counter')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

}
