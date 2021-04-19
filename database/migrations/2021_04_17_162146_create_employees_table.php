<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('nameInitial');
            $table->text('fullName');
            $table->text('address1');
            $table->text('address2');
            $table->text('city');
            $table->text('date');
            $table->text('Mnumber');
            $table->text('Lnumber');
            $table->text('email');
            $table->text('gender');
            $table->text('dob');
            $table->text('nic' );
            $table->text('department');
            $table->text('special');
            $table->text('Gname');
            $table->text('GardianType');
            $table->text('add3');
            $table->text('add4');
            $table->text('city2');
            $table->text('Mnumber2');
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
        Schema::dropIfExists('employees');
    }
}
