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
            $table->date('spdate');
            $table->time('from', $precision = 2);
            $table->time('to', $precision = 2);
            $table->text('review');
            $table->text('tid');
            $table->text('sid');
            $table->text('cid');
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
