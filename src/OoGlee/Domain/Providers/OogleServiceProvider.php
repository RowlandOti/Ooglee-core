<?php namespace Ooogle\Domain\Providers;

use Illuminate\Support\ServiceProvider;

class OogleServiceProvider extends ServiceProvider {

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
		// Passing custom namespace to package method
		// package('vendor/package', 'custom-namespace')
		$this->package('rowland/ooglee-core','ooglee-core');

		\App::register('Ooglee\Domain\Providers\HashingServiceProvider');
		\App::register('Ooglee\Domain\Providers\SyncCommandBusServiceProvider');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

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
