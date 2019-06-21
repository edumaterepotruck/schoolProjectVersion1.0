<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('firstname',100);
            $table->string('lastname',100);            
            $table->string('gender',10);
            $table->date('dob')->nullable();
            $table->string('identification',100);
            $table->string('bloodGroup',5);
            
            $table->date('admission_date'); 
            $table->string('admission_no',50);
            $table->string('rollno',50)->nullable();
            $table->string('registration_no',50)->nullable();

            $table->string('gaurdianName',100);
            $table->string('gaurdianRelation',100);

            $table->string('mobile',25);
            $table->string('alt_mobile',25);
            $table->string('telephone',25);
            $table->string('email',100)->unique()->nullable();
            
            $table->string('address1',255);
            $table->string('address2',255)->nullable();
            $table->string('city',100);
            $table->string('country',100);
            $table->string('state',100);
            $table->string('district',100);
            $table->string('pincode',50);

            $table->string('photo');

            $table->bigInteger('religion_id')->unsigned();
            $table->bigInteger('caste_id')->unsigned();

            $table->foreign('religion_id')->references('id')->on('religions');
            $table->foreign('caste_id')->references('id')->on('castes');

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
