<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_notes', function (Blueprint $table) {
             $table->increments('id');
            $table->Integer('notes_id')->unsigned();
            $table->foreign('notes_id')->references('id')->on('notes')->onDelete('cascade');
            $table->integer('access_code');
            $table->integer('is_scheduled');
            $table->dateTime('scheduled_at');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_notes');
    }
}
