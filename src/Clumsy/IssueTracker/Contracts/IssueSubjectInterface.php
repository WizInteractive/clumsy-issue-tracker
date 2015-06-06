<?php namespace Clumsy\IssueTracker\Contracts;

interface IssueSubjectInterface {

    public function issues();

    public function pendingIssues();

    public function resolvedIssues();

    public function createIssue(array $attributes = null);
}