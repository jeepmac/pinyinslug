<?php namespace Jeepmac\Pinyinslug;

use Illuminate\Support\ServiceProvider;

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
		$this->app->alias('Pinyinslug', 'Jeepmac\Pinyinslug\Facades\PinyinslugFacade');
		$this->app->alias(Pinyinslug::class, 'pinyinslug');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'pinyinslug');
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
