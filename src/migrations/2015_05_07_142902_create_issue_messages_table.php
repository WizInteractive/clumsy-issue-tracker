<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('issue_id')->unsigned();
			$table->integer('author_id')->unsigned();
			$table->string('author_type');
			$table->text('content')->nullable()->default(null);

			$table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
			$table->index('author_id');
			$table->index('author_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('issue_messages', function($table)
		{
			$table->dropForeign('issue_messages_issue_id_foreign');
		});

		Schema::drop('issue_messages');
	}

}
