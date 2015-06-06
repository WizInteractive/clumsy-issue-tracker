<?php namespace Clumsy\IssueTracker\Contracts;

interface WatcherInterface {

    public function issues();

    public function issuesOwned();

    public function messages();
}