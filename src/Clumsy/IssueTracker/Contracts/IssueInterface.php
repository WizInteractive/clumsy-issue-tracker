<?php namespace Clumsy\IssueTracker\Contracts;

interface IssueInterface {

    public function messages();

    public function addMessage(array $attributes, $author);
}