<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->string('id',4);
            $table->string('sector',191)->nullable();
            $table->string('placeOfTraining',191)->nullable();
            $table->integer('enterpriseId')->unsigned()->nullable();
            $table->enum('type',['S','G']);
            $table->integer('studentId')->unsigned();
            $table->foreign('studentId')->references('id')->on('students');
            $table->foreign('enterpriseId')->references('id')->on('enterprises');
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('training');
    }
}
