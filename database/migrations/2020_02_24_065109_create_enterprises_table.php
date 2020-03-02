<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('email')->unique();
            $table->string('mobile',10)->unique();
            $table->integer('addressId')->unsigned();
            $table->foreign('addressId')->references('id')->on('address');
            $table->boolean('hosting')->default(0);
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
        Schema::dropIfExists('enterprises');
    }
}
