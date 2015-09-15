<?php namespace Ooglee\Infrastructure\BreadCrumb\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\Providers\LaravelServiceProvider;

class BreadCrumbServiceProvider extends LaravelServiceProvider {

	protected $packageVendor = 'rowland';

	protected $packageName = 'ooglee-breadcrumb';

	protected $packageDir = __DIR__;

	protected $packageNameCapitalized = 'Ooglee-breadcrumb';

	protected $packageConfigClass = 'Ooglee\Infrastructure\Config\OogleeBreadCrumbConfig';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
		$this->loadBreadCrumbs();
	}
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();
		$this->registerFacades();
		$this->registerBreadcrumb();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['breadcrumb'];
	}

	/**
	 * Register the breadcrumb object instance e.g 
	 *
	 * @return void
	 */
	private function registerBreadCrumb()
	{
		if (isLaravel5())
		{
			// Place module in IoC container
	        $this->app->bindShared('breadcrumb', function($app)
			{
				$breadcrumb = $this->app->make('Ooglee\Infrastructure\BreadCrumb\Manager');

				$breadcrumb->setView($this->getConfig('config.breadcrumb_view.view'));
				var_dump($this->getConfig('config.breadcrumb_view.view'));

				return $breadcrumb;
			});
		}
	}

	private function registerFacades() 
	{
		// Third Party Service Providers

		/**
        * This allows the facade to work without the developer having to add it to the Alias array in config/app.php
        * http://fideloper.com/create-facade-laravel-4
        * Works for L5 too
        */
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();

			$loader->alias('OogleeBCConfig', 'Ooglee\Infrastructure\Config\Facades\OogleeBreadCrumbConfigFacade');
			$loader->alias('BreadCrumbs', 'Ooglee\Infrastructure\BreadCrumb\Facades\BreadCrumbFacade');

			// Third Party Facades
        });

        return true;
	}

	private function loadBreadCrumbs() 
	{
		require __DIR__.'/../config/breadcrumb.php';
	}
}
