<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title',191);
            $table->string('description',255);
            $table->dateTime('startTime');
            $table->dateTime('expectedTime');
            $table->dateTime('actualTime');
            $table->integer('supervisorId')->unsigned();
            $table->integer('studentId')->unsigned();
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
        Schema::dropIfExists('tasks');
    }
}
