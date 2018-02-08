<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicantEducationTable extends Migration {

	public function up()
	{
		Schema::create('applicant_education', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('applicant_id')->unsigned();
			$table->integer('education_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('applicant_education');
	}
}