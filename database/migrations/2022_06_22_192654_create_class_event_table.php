<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassEventTable extends Migration {

	public function up()
	{
		Schema::create('class_event', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('class_id');
			$table->unsignedBigInteger('event_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('class_event');
	}
}