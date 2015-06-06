<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait IssueTracked {

    public function issues()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_subject');
    }

    public function createIssue()
    {
        $issue = IssueTracker::create(array(
            'subject_id'   => $this->id,
            'subject_type' => class_basename($this),
        ));

        return $issue;
    }
}