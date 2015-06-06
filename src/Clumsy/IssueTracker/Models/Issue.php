<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Facade as IssueTracker;

class Issue extends Eloquent {

    public function messages()
    {
        return $this->hasMany(IssueTracker::getMessageModel());
    }
}