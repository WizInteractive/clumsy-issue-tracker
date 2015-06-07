<?php namespace Clumsy\IssueTracker\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Clumsy\IssueTracker\Contracts\IssueMessageInterface;
use Clumsy\IssueTracker\Traits\IssueMessage as IssueMessageTrait;

class IssueMessage extends Eloquent implements IssueMessageInterface {

    use IssueMessageTrait;
}