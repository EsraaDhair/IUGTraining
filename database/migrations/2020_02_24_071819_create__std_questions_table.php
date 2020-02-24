<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStdQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_questions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('QText',191);
            $table->text('answer');
            $table->integer('QOrder');
            $table->integer('reportId')->unsigned();
            $table->foreign('reportId')->references('id')->on('students_report');
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
        Schema::dropIfExists('_std_questions');
    }
}
