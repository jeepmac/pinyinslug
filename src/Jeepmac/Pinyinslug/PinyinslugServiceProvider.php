<?php namespace Jeepmac\Pinyinslug;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class PinyinslugServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jeepmac/pinyinslug');

		AliasLoader::getInstance()->alias('Pinyinslug', 'Jeepmac\Pinyinslug\Facades\PinyinslugFacade');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['pinyinslug'] = $this->app->share(function($app)
		{
			return new Pinyinslug;
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
