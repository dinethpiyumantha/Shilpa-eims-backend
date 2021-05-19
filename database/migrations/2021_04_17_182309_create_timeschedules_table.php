<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeschedules', function (Blueprint $table) {
            $table->id();
            $table->text('type');                   //Type
            $table->date('spdate');                 //Date
            $table->time('from', $precision = 2);   //Time From
            $table->time('to', $precision = 2);     //Time To
            $table->text('review');                 //Review
            $table->text('day');                    //Day
            $table->text('tid');                    //Teacher
            $table->text('sid');                    //Subject
            $table->text('classid');                //Classroom
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
        Schema::dropIfExists('timeschedules');
    }
}
