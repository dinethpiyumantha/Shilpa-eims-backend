<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->text('nameInitil');
            $table->text('nameFull');
            $table->text('addressL1');
            $table->text('addressL2');
            $table->text('city');
            $table->text('joinDate');
            $table->text('mNumber');
            $table->text('lNumber');
            $table->text('email');
            $table->text('gender');
            $table->text('dob');
            $table->text('gName');
            $table->text('gType');
            $table->text('gAddress1');
            $table->text('gAddress2');
            $table->text('gCity');
            $table->text('gMnumber');
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
        Schema::dropIfExists('teachers');
    }
}
