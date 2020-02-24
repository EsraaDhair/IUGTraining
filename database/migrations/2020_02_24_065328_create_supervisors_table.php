<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
                $table->Increments('userId')->unsigned();
                $table->string('jobTitle');
                $table->integer('enterpriseId')->unsigned();
                $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('supervisors');
    }
}
