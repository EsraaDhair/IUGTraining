<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('userId')->unsigned();
            $table->string('stdId',9);
            $table->enum('niche',['SD','MM','CS','IS','MO']);
//            $table->integer('endedHours');
            $table->integer('addressId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('addressId')->references('id')->on('address');
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
        Schema::dropIfExists('students');
    }
}
