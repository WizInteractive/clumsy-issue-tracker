<?php namespace Clumsy\IssueTracker\Support;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Provider {

    protected $model;

    public function __construct($model = null)
    {
        if ($model)
        {
            $this->model = $model;
        }
    }

    protected function createEloquent(Eloquent $model)
    {
        return $model;
    }

    /**
     * Create a new instance of the model.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function createModel()
    {
        $class = '\\'.ltrim($this->model, '\\');

        return $this->createEloquent(new $class);
    }

    /**
     * Creates an issue.
     *
     * @param  array  $attributes
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        $issue = $this->createModel();
        $issue->fill($attributes);
        $issue->save();

        return $issue;
    }

    /**
     * Returns the model class name currently being used
     *
     * @param  string  $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets a new model class name to be used at
     * runtime.
     *
     * @param  string  $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}