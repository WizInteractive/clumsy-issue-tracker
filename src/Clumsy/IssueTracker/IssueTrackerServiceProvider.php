<?php
namespace Clumsy\IssueTracker;

use Illuminate\Support\ServiceProvider;
use Clumsy\IssueTracker\Support\IssueProvider;
use Clumsy\IssueTracker\Support\MessageProvider;

class IssueTrackerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $path = __DIR__.'/../..';

        $this->package('clumsy/issue-tracker', 'clumsy/issue-tracker', $path);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['clumsy.issue-tracker.issue-provider'] = $this->app->share(function ($app) {
        
            $model = $app['config']['clumsy/issue-tracker::issues.model'];

            return new IssueProvider($model);
        });

        $this->app['clumsy.issue-tracker.message-provider'] = $this->app->share(function ($app) {
        
            $model = $app['config']['clumsy/issue-tracker::messages.model'];

            return new MessageProvider($model);
        });

        $this->app['clumsy.issue-tracker'] = $this->app->share(function ($app) {
        
            return new IssueTracker(
                $app['clumsy.issue-tracker.issue-provider'],
                $app['clumsy.issue-tracker.message-provider'],
                $app['config']
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'clumsy.issue-tracker',
        );
    }
}
