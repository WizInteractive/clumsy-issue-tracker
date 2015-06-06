<?php namespace Clumsy\IssueTracker\Contracts;

interface WatcherInterface {

    public function issues();

    public function pendingIssues();

    public function resolvedIssues();

    public function issuesOwned();

    public function pendingIssuesOwned();

    public function resolvedIssuesOwned();

    public function messages();   
}