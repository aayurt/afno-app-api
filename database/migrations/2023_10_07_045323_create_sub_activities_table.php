<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->jsonb('title')->nullable();
            $table->jsonb('subtitle')->nullable();
            $table->jsonb('body')->nullable();
            $table->string('link')->nullable();
            $table->boolean('fullWidth')->default(false);
            $table->boolean('enabled')->default(true);
            $table->boolean('textTop')->default(true);
            $table->boolean('textDark')->default(true);
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
        Schema::dropIfExists('sub_activities');
    }
}