<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Contracts\IssueInterface;
use Clumsy\IssueTracker\Traits\Issue as IssueTrait;

class Issue extends Eloquent implements IssueInterface {

    use IssueTrait;
}