<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_mappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('class_detail_id')->unsigned();
            $table->bigInteger('class_division_id')->unsigned();
            $table->bigInteger('class_branch_id')->unsigned()->nullable();

            $table->foreign('class_detail_id')->references('id')->on('class_details');
            $table->foreign('class_division_id')->references('id')->on('class_divisions');
            $table->foreign('class_branch_id')->references('id')->on('class_branches');

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
        Schema::dropIfExists('class_mappings');
    }
}
