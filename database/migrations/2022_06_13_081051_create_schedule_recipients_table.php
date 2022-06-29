<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_recipients', function (Blueprint $table) {
              $table->increments('id');
            $table->Integer('schedule_notes_id')->unsigned();
            $table->foreign('schedule_notes_id')->references('id')->on('schedule_notes')->onDelete('cascade');
             // $table->integer('recipients_id');

            $table->integer('recipients_id')->unsigned();
            $table->foreign('recipients_id')->references('id')->on('schedule_notes')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_recipients');
    }
}
