<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_sectors', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->integer('femaleStudentsNO');
            $table->integer('maleStudentsNO');
            $table->integer('enterpriseId')->unsigned();
            $table->foreign('enterpriseId')->references('id')->on('enterprises');
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
        Schema::dropIfExists('training_sectors');
    }
}
