<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Facade as IssueTracker;
use Clumsy\IssueTracker\Contracts\MessageInterface;
use Clumsy\IssueTracker\Contracts\IssueInterface;

class Issue extends Eloquent implements IssueInterface {

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
    );

    public function messages()
    {
        return $this->hasMany(IssueTracker::getMessageModel());
    }

    public function addMessage(MessageInterface $message)
    {
        $this->messages()->save($message);

        return $this;
    }
}