<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('class_mappings_id')->unsigned();
            $table->bigInteger('days_id')->unsigned();
            $table->bigInteger('periods_id')->unsigned();
            $table->bigInteger('subjects_id')->unsigned();            
            $table->string('record_status', 25)->default('active')->nullable();
            $table->timestamps();

            $table->foreign('class_mappings_id')->references('id')->on('class_mappings');
            $table->foreign('days_id')->references('id')->on('days');
            $table->foreign('periods_id')->references('id')->on('periods');
            $table->foreign('subjects_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
}
