<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_questions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('QText',191);
            $table->string('answer',1);
            $table->string('comment',255);
            $table->integer('QOrder');
            $table->integer('reportId')->unsigned();
            $table->foreign('reportId')->references('id')->on('enterprises_report');
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
        Schema::dropIfExists('e_questions');
    }
}
