<?php
namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;
use Clumsy\IssueTracker\Contracts\IssueInterface;

trait IssueWatcher
{
    public function issues()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_watcher')
                    ->withPivot(
                        'created_at',
                        'updated_at',
                        'owner'
                    );
    }

    public function pendingIssues()
    {
        return $this->issues()->where('resolved', false);
    }

    public function resolvedIssues()
    {
        return $this->issues()->where('resolved', true);
    }

    public function issuesOwned()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_watcher')
                    ->withPivot(
                        'created_at',
                        'updated_at',
                        'owner'
                    )
                    ->where('owner', true);
    }

    public function pendingIssuesOwned()
    {
        return $this->issuesOwned()->where('resolved', false);
    }

    public function resolvedIssuesOwned()
    {
        return $this->issuesOwned()->where('resolved', true);
    }

    public function watchIssue(IssueInterface $issue, $owner = false)
    {
        return IssueTracker::addWatcher($issue, $this, $owner);
    }

    public function ownsIssue(IssueInterface $issue)
    {
        $owned = $this->issuesOwned->lists('id');

        return in_array($issue->id, $owned);
    }

    public function issueMessages()
    {
        return $this->morphMany(IssueTracker::getMessageModel(), 'author');
    }
}
