<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentClassMappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_mapps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('students_id')->unsigned();
            $table->bigInteger('class_mappings_id')->unsigned();
            $table->bigInteger('academic_years_id')->unsigned();

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('class_mappings_id')->references('id')->on('class_mappings');
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
        Schema::dropIfExists('student_class_mapps');
    }
}
