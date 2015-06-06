<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent {

    protected $table = 'issue_messages';

    public function author()
    {
        return $this->morphTo();
    }
}