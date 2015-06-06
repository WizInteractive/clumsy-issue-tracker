<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Contracts\MessageInterface;

class IssueMessage extends Eloquent implements MessageInterface {

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
        'issue_id',
        'author_type',
        'author_id',
    );

    public function author()
    {
        return $this->morphTo();
    }
}