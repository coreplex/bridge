<?php

namespace Coreplex\Bridge;

use Illuminate\Support\ServiceProvider;

class JavascriptServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['coreplex.bridge.javascript'] = $this->app->share(function ($app) {
            return new Javascript;
        });

        $this->app->alias('coreplex.bridge.javascript', 'Coreplex\Bridge\Contracts\Javascript');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['coreplex.bridge.javascript', 'Coreplex\Bridge\Contracts\Javascript'];
    }
}