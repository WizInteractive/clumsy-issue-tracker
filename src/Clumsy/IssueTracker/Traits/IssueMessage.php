<?php
namespace Clumsy\IssueTracker\Traits;

use Clumsy\IssueTracker\Facade as IssueTracker;

trait IssueMessage
{
    public static function bootIssueMessage()
    {
        self::saving(function ($model) {
            $touches = $model->getTouchedRelations();
            $touches[] = 'issue';
            $model->setTouchedRelations($touches);
        });
    }

    public function issue()
    {
        return $this->belongsTo(IssueTracker::getIssueModel());
    }

    public function author()
    {
        return $this->morphTo();
    }
}
