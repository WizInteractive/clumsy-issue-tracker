<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_subjects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('issue_id')->unsigned();
			$table->integer('issue_subject_id')->unsigned();
			$table->string('issue_subject_type');

			$table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
			$table->index('issue_subject_id');
			$table->index('issue_subject_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('issue_subjects', function($table)
		{
			$table->dropForeign('issue_subjects_issue_id_foreign');
		});

		Schema::drop('issue_subjects');
	}

}
