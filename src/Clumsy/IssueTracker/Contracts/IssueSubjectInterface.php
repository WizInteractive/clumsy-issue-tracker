<?php namespace Clumsy\IssueTracker\Contracts;

interface IssueSubjectInterface {

    public function issues();

    public function createIssue(array $attributes = null);
}