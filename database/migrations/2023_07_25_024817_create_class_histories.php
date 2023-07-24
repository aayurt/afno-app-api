<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('msg')->nullable();
            $table->date('past_date')->nullable();
            $table->date('upgrade_date')->nullable();

            $table->unsignedInteger('student_class_id')->nullable();
            $table->foreign('student_class_id')->references('id')->on('student_classes')->onDelete('cascade');
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
        Schema::dropIfExists('class_histories');
    }
}