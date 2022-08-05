<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classrooms', function(Blueprint $table) {

		});
        Schema::table('sections', function(Blueprint $table) {

        });

        Schema::table('my__parents', function(Blueprint $table) {

        });

        Schema::table('parent_attachments', function(Blueprint $table) {

        });
	}

	public function down()
	{
	
	}
}