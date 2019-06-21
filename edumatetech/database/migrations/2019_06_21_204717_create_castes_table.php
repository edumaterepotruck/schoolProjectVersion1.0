<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('castes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->bigInteger('religion_id')->unsigned();            
            $table->string('record_status', 25)->default('active')->nullable();
            $table->timestamps();

            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('castes');
    }
}
