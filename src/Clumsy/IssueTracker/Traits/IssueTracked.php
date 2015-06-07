<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;
use Clumsy\IssueTracker\Contracts\IssueInterface;

trait IssueTracked {

    public function issues()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_subject');
    }

    public function pendingIssues()
    {
        return $this->issues()->where('resolved', false);
    }

    public function resolvedIssues()
    {
        return $this->issues()->where('resolved', true);
    }

    public function createIssue(array $attributes = null)
    {
        return IssueTracker::create($this, $attributes);
    }

    public function assignIssue(IssueInterface $issue)
    {
        return $this->issues()->save($issue);
    }
}