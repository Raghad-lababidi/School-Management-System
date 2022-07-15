<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration {

	public function up()
	{
		Schema::create('administrators', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('age');
			$table->string('certification');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('administrators');
	}
}