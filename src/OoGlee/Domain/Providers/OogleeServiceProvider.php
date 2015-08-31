<?php namespace Ooglee\Domain\Providers;

use Ooglee\Domain\Providers\LaravelServiceProvider;

class OogleeServiceProvider extends LaravelServiceProvider {

	protected $packageVendor = 'rowland';

	protected $packageName = 'ooglee-platform';

	protected $packageDir = __DIR__;

	protected $packageNameCapitalized = 'Ooglee-platform';

	protected $packageConfigClass = 'Ooglee\Infrastructure\Config\OogleeConfig';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

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
		parent::register();
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
