<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait IssueMesage {

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