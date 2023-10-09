<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->jsonb('title')->nullable();
            $table->jsonb('subtitle')->nullable();
            $table->jsonb('body')->nullable();
            $table->integer('sortNumber')->unique();
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
        Schema::dropIfExists('activities');
    }
}