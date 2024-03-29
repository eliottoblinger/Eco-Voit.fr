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
            $table->string('departure_address')->nullable();
            $table->string('arrival_city');
            $table->string('arrival_zip_code');
            $table->string('arrival_address')->nullable();
            $table->datetime('departure_date');
            $table->integer('duration');
            $table->integer('meters');
            $table->integer('price');
            $table->text('description')->nullable();
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
