<?php namespace Coreplex\Bridge;

use Illuminate\Support\ServiceProvider;

class JavascriptServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['coreplex.bridge.javascript'] = $this->app->share(function($app)
        {
            return new Javascript;
        });

        $this->app['Coreplex\Bridge\Contracts\Javascript'] = $this->app->share(function($app)
        {
        	return $app['coreplex.bridge.javascript'];
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
