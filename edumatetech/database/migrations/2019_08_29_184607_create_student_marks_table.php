<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('students_id')->unsigned();
            $table->string('mark', 10);
            $table->string('totalmark', 10);
            $table->bigInteger('subjects_id')->unsigned();
            $table->bigInteger('examtypes_id')->unsigned();
            $table->bigInteger('academic_years_id')->unsigned();

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->foreign('examtypes_id')->references('id')->on('examtypes');
            $table->foreign('academic_years_id')->references('id')->on('academic_years');

            $table->string('record_status', 25)->default('active')->nullable();
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
        Schema::dropIfExists('student_marks');
    }
}
