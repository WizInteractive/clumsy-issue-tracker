<?php namespace Clumsy\IssueTracker\Contracts;

interface IssueInterface {

    public function issueMessages();

    public function addMessage(array $attributes, $author);
}