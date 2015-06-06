<?php namespace Clumsy\IssueTracker;

use Illuminate\Config\Repository as Config;
use Clumsy\IssueTracker\Support\IssueProvider;
use Clumsy\IssueTracker\Support\MessageProvider;

class IssueTracker {

    public function __construct(IssueProvider $issue_provider, MessageProvider $message_provider, Config $config)
    {
        $this->issues = $issue_provider;
        $this->messages = $message_provider;
        
        $this->config = $config;
    }

    public function getIssueModel()
    {
        return $this->issues->getModel();
    }

    public function getMessageModel()
    {
        return $this->messages->getModel();
    }

    public function assignDefaultOwners($issue)
    {

    }

    public function create(array $attributes)
    {
        $attributes = array('private' => $this->config->get('clumsy/issue-tracker::issues.private')) + $attributes;
        
        $issue = $this->issues->create($attributes);

        $this->assignDefaultOwners($issue);

        return $issue;
    }
}