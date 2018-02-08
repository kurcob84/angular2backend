<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleTable extends Migration {

	public function up()
	{
		Schema::create('role', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 250);
			$table->string('slug', 250);
		});
	}

	public function down()
	{
		Schema::drop('role');
	}
}