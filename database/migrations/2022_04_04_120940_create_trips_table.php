<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('departure_city');
            $table->string('departure_zip_code');
            $table->string('departure_address');
            $table->string('arrival_city');
            $table->string('arrival_zip_code');
            $table->string('arrival_address');
            $table->datetime('departure_date');
            $table->datetime('arrival_date');
            $table->float('kilometers');
            $table->float('price');
            $table->text('description');
            $table->integer('number_of_seats');
            $table->enum('status', ['planned', 'in_progress', 'finished']);
            $table->string('unique_key');
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
        Schema::dropIfExists('trips');
    }
}
