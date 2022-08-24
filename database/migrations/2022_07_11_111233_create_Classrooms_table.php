<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('classrooms', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name_class');
			$table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')
            ->onDelete('cascade')
            ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('classrooms');
        Schema::table('classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_grade_id_foreign');
		});
	}
}