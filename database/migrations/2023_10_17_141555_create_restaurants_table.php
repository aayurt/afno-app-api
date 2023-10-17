<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('enabled')->default(true);

            $table->string('phone_number')->nullable();
            $table->string('alternate_phone_number')->nullable();
            $table->string('link')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->time('monday_open_time')->nullable();
            $table->time('monday_close_time')->nullable();
            $table->time('tuesday_open_time')->nullable();
            $table->time('tuesday_close_time')->nullable();
            $table->time('wednesday_open_time')->nullable();
            $table->time('wednesday_close_time')->nullable();
            $table->time('thursday_open_time')->nullable();
            $table->time('thursday_close_time')->nullable();
            $table->time('friday_open_time')->nullable();
            $table->time('friday_close_time')->nullable();
            $table->time('saturday_open_time')->nullable();
            $table->time('saturday_close_time')->nullable();
            $table->time('sunday_open_time')->nullable();
            $table->time('sunday_close_time')->nullable();


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
        Schema::dropIfExists('restaurants');
    }
}