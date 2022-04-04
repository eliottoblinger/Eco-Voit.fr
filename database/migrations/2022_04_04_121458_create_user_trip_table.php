<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trip', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code_url');
            $table->integer('rating')->nullable();
            $table->text('opinion')->nullable();
            $table->boolean('is_driver')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trip_id')->references('id')->on('trips');
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
        Schema::dropIfExists('user_trip');
    }
}
