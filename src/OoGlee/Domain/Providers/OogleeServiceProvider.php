<?php namespace Ooglee\Domain\Providers;

use Ooglee\Domain\Providers\LaravelServiceProvider;

class OogleeServiceProvider extends LaravelServiceProvider {

	protected $packageVendor = 'rowland';

	protected $packageName = 'ooglee-core';

	protected $packageDir = __DIR__;

	protected $packageNameCapitalized = 'Ooglee-core';

	protected $packageConfigClass = 'Ooglee\Infrastructure\Config\OogleeConfig';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();

		\App::register('Ooglee\Domain\Providers\HashingServiceProvider');
		\App::register('Ooglee\Domain\Providers\SyncCommandBusServiceProvider');

		// Third Party Service Providers
		\App::register('Collective\Html\HtmlServiceProvider');

		/**
        * This allows the facade to work without the developer having to add it to the Alias array in app/config/app.php
        * http://fideloper.com/create-facade-laravel-4
        * Works for L5 too
        */
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();

			$loader->alias('OogleeCConfig', 'Ooglee\Infrastructure\Config\Facades\OogleeConfigFacade');

			// Third Party Facades
			$loader->alias('Form', 'Collective\Html\FormFacade');
            $loader->alias('Html', 'Collective\Html\HtmlFacade');
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
