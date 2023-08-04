<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->time('clock_in')->default("00:00:00");
            $table->time('clock_out')->default("00:00:00");
            $table->time('early')->default("00:00:00");
            $table->boolean('must_cin')->default(true);
            $table->boolean('must_cout')->default(true);
            $table->time('att_time')->default("00:00:00");
            $table->unsignedInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::dropIfExists('member_attendances');
    }
}