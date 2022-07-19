<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsReceiversTable extends Migration {

	public function up()
	{
		Schema::create('complaints_receivers', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('complaint_id');
			$table->unsignedBigInteger('receiver_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('complaints_receivers');
	}
}