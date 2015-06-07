<?php namespace Clumsy\IssueTracker;

use Illuminate\Config\Repository as Config;
use Clumsy\IssueTracker\Contracts\IssueInterface;
use Clumsy\IssueTracker\Contracts\IssueWatcherInterface;
use Clumsy\IssueTracker\Contracts\IssueSubjectInterface;
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

    public function addWatcher(IssueInterface $issue, IssueWatcherInterface $watcher, $owner = false)
    {
        return $watcher->issues()->save($issue, compact('owner'));
    }

    public function addDefaultOwners(IssueInterface $issue)
    {
        $owners = (array)$this->config->get('clumsy/issue-tracker::watchers.owners');

        foreach ($owners as $class => $ids)
        {
            $class = '\\'.ltrim($class, '\\');

            foreach ((array)$ids as $id)
            {
                $model = with(new $class)->find($id);
                
                if ($model)
                {
                    $this->addWatcher($issue, $model, $owner = true);
                }
            }
        }
    }

    public function create(IssueSubjectInterface $subject, array $attributes = null)
    {
        $attributes = array('private' => (bool)$this->config->get('clumsy/issue-tracker::issues.private')) + (array)$attributes;
        
        $issue = $this->issues->create($attributes);

        $subject->issues()->save($issue);

        $this->addDefaultOwners($issue);

        return $issue;
    }

    public function createMessage(array $attributes, $author)
    {
        $attributes = array('author_id' => $author->id, 'author_type' => class_basename($author)) + $attributes;

        $message = $this->messages->instantiate($attributes);

        return $message;
    }
}