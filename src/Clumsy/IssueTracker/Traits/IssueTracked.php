<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait IssueTracked {

    public function issues()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_subject');
    }

    public function createIssue(array $attributes = null)
    {
        return IssueTracker::create($this, $attributes);
    }
}