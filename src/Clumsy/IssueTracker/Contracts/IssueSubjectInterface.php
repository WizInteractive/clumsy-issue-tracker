<?php namespace Clumsy\IssueTracker\Contracts;

use Clumsy\IssueTracker\Contracts\IssueInterface;

interface IssueSubjectInterface {

    public function issues();

    public function pendingIssues();

    public function resolvedIssues();

    public function createIssue(array $attributes = null);

    public function assignIssue(IssueInterface $issue);
}