<?php

return array(

	'issues' => array(

		/*
		|--------------------------------------------------------------------------
		| Model
		|--------------------------------------------------------------------------
		|
		| Which Eloquent model should be used for all issues
		|
		*/

		'model' => 'Clumsy\IssueTracker\Models\Issue',

		/*
		|--------------------------------------------------------------------------
		| Privacy
		|--------------------------------------------------------------------------
		|
		| Whether the issue and its messages are visible only to its watchers
		| Note: this can be individually overridden when creating new issues
		|
		*/

		'private' => true,

	),

	'watchers' => array(

		/*
		|--------------------------------------------------------------------------
		| Default watcher-owners
		|--------------------------------------------------------------------------
		|
		| Which are set as default owners when adding new issues
		| i.e. class_basename => id
		|
		*/

		'owners' => array(),
	),

);
