<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait IssueWatcher {

    public function issues()
    {
        return $this->morphToMany(IssueTracker::getIssueModel(), 'issue_watcher')
                    ->withPivot(
                        'created_at',
                        'updated_at',
                        'owner'
                    );
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

    public function messages()
    {
        return $this->morphMany(IssueTracker::getMessageModel(), 'author');
    }
}