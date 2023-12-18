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
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->boolean('enabled')->default(true);

            $table->string('phone_number')->nullable();
            $table->string('alternate_phone_number')->nullable();
            $table->string('link')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();

            $table->double('latitude')->nullable()->default(51.5074); // Central London latitude
            $table->double('longitude')->nullable()->default(-0.1278); // Central London longitude

            $table->time('monday_open_time')->nullable()->default('09:00:00');
            $table->time('monday_close_time')->nullable()->default('19:00:00');
            $table->time('tuesday_open_time')->nullable()->default('09:00:00');
            $table->time('tuesday_close_time')->nullable()->default('19:00:00');
            $table->time('wednesday_open_time')->nullable()->default('09:00:00');
            $table->time('wednesday_close_time')->nullable()->default('19:00:00');
            $table->time('thursday_open_time')->nullable()->default('09:00:00');
            $table->time('thursday_close_time')->nullable()->default('19:00:00');
            $table->time('friday_open_time')->nullable()->default('09:00:00');
            $table->time('friday_close_time')->nullable()->default('19:00:00');
            $table->time('saturday_open_time')->nullable()->default('09:00:00');
            $table->time('saturday_close_time')->nullable()->default('19:00:00');
            $table->time('sunday_open_time')->nullable()->default('09:00:00');
            $table->time('sunday_close_time')->nullable()->default('19:00:00');


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