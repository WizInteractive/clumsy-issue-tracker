<?php namespace Clumsy\IssueTracker\Contracts;

use Clumsy\IssueTracker\Contracts\IssueInterface;

interface IssueWatcherInterface {

    public function issues();

    public function pendingIssues();

    public function resolvedIssues();

    public function issuesOwned();

    public function pendingIssuesOwned();

    public function resolvedIssuesOwned();

    public function watchIssue(IssueInterface $issue, $owner = false);

    public function ownsIssue(IssueInterface $issue);

    public function messages();   
}