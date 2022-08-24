<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name_father');
            $table->string('national_ID_father');
            $table->string('passport_ID_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->bigInteger('nationality_father_id')->unsigned();
            $table->bigInteger('blood_type_father_id')->unsigned();
            $table->bigInteger('religion_father_id')->unsigned();
            $table->string('address_father');
            $table->string('name_mother');
            $table->string('national_ID_mother');
            $table->string('passport_ID_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->bigInteger('nationality_mother_id')->unsigned();
            $table->bigInteger('blood_type_mother_id')->unsigned();
            $table->bigInteger('religion_mother_id')->unsigned();
            $table->string('address_mother');
            $table->foreign('nationality_father_id')->references('id')->on('nationalities');
            $table->foreign('blood_type_father_id')->references('id')->on('type__bloods');
            $table->foreign('religion_father_id')->references('id')->on('religions');
            $table->foreign('nationality_mother_id')->references('id')->on('nationalities');
            $table->foreign('blood_type_mother_id')->references('id')->on('type__bloods');
            $table->foreign('religion_mother_id')->references('id')->on('religions');
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
        Schema::dropIfExists('myparents');
    }
}