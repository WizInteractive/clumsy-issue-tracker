<?php namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait Issue {

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
    );

    public function issueMessages()
    {
        return $this->hasMany(IssueTracker::getMessageModel());
    }

    public function addMessage(array $attributes, $author)
    {
        $message = IssueTracker::createMessage($attributes, $author);

        $this->issueMessages()->save($message);

        return $this;
    }
}