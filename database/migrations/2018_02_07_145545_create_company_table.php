<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	public function up()
	{
		Schema::create('company', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('email', 150)->unique();
			$table->string('password', 250);
			$table->string('name', 250);
			$table->string('about_us', 500);
			$table->integer('founding');
			$table->string('size', 250);
			$table->string('xing', 250);
			$table->string('website', 250);
			$table->string('linkedin', 250);
			$table->string('youtube', 250);
			$table->string('twitter', 250);
			$table->string('telephone', 250);
			$table->integer('role_id')->unsigned();
			$table->integer('picture_id')->unsigned();
			$table->rememberToken('rememberToken');
		});
	}

	public function down()
	{
		Schema::drop('company');
	}
}