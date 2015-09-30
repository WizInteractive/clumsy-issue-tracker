<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueWatchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_watchers', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->integer('issue_id')->unsigned();
            $table->integer('issue_watcher_id')->unsigned();
            $table->string('issue_watcher_type');
            $table->boolean('owner')->default(0);

            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            ;
            $table->index('issue_watcher_id');
            $table->index('issue_watcher_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_watchers', function ($table) {

            $table->dropForeign('issue_watchers_issue_id_foreign');
        });

        Schema::drop('issue_watchers');
    }
}
