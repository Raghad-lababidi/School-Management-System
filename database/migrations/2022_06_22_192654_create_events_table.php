<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->date('date');
			$table->string('title');
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}