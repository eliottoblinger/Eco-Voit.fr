<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notification', function (Blueprint $table) {
            $table->id();
            $table->boolean('read')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('notification_id')->references('id')->on('notifications');
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
        Schema::dropIfExists('user_notification');
    }
}
