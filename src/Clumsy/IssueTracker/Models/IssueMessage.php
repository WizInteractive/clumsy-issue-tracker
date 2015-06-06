<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Contracts\IssueMessageInterface;
use Clumsy\IssueTracker\Facade as IssueTracker;

class IssueMessage extends Eloquent implements IssueMessageInterface {

    protected $touches = array('issue');

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
        'issue_id',
    );

    public function issue()
    {
        return $this->belongsTo(IssueTracker::getIssueModel());
    }

    public function author()
    {
        return $this->morphTo();
    }
}