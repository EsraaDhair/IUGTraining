<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('rate');
            $table->string('comment',255);
            $table->integer('supervisorId')->unsigned();
            $table->integer('taskId')->unsigned();
            $table->integer('studentId')->unsigned();
            $table->foreign('taskId')->references('id')->on('tasks');
            $table->foreign('supervisorId')->references('userId')->on('supervisors');
            $table->foreign('studentId')->references('userId')->on('students');
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
        Schema::dropIfExists('rates');
    }
}
