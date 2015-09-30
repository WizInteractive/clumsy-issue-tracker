<?php
namespace Clumsy\IssueTracker\Contracts;

interface IssueMessageInterface
{
    public function issue();

    public function author();
}
