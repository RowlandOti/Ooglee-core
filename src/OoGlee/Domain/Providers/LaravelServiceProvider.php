<?php namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Infrastructure\Config\LaravelConfig;

abstract class LaravelServiceProvider extends ServiceProvider {


	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Is this service provider registered?
	 *
	 * @return string
	 */

	protected $registered = false;

	/**
	 * Get Laravel version
	 *
	 * @return boolean
	 */
	protected function isLaravel5()
	{
		$laravel = app();

		return $laravel::VERSION >= 5;
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishFiles();
		$this->loadViews();
		$this->loadTranslations();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerCurrentDir();
		$this->registerPackageNameSpace();
		$this->registerPackageConfig();
	}

	
	// Allow your user to publish the config
	private function publishFiles()
	{
		if ($this->isLaravel5())
		{
			if (file_exists($configFile = $this->__DIR__.'/../../../config/config.php'))
			{
				$publish_path = 'config/vendor/'.$this->packageNameSpace.DIRECTORY_SEPARATOR.'config.php';
				$this->publishes([$configFile => base_path($publish_path) ],'config');
			}

			if (file_exists($viewsPath = $this->__DIR__.'/../../../resources/views/'))
			{
				$publish_path = 'resources/views/vendor/'.$this->packageNameSpace;
				$this->publishes([$viewsPath => base_path($publish_path) ],'views');
			}

			if (file_exists($langsPath = $this->__DIR__.'/../../../resources/lang/'))
			{
				$publish_path = 'resources/lang/vendor/'.$this->packageNameSpace;
				$this->publishes([$langsPath => base_path($publish_path) ],'views');
			}

			if (file_exists($migrationsPath = $this->__DIR__.'/../../../migrations/'))
			{
				$publish_path = 'database/migrations/vendor/'.$this->packageNameSpace;
				$this->publishes([$migrationsPath => base_path($publish_path) ],'migrations');
			}

			if (file_exists($seedsPath = $this->__DIR__.'/../../../seeds/'))
			{
				$publish_path = 'database/seeds/vendor/'.$this->packageNameSpace;
				$this->publishes([$seedsPath => base_path($publish_path) ],'seeds');
			}
		}
	}

	private function registerPackageNameSpace()
	{
		if (isLaravel5())
		{
			$this->packageNameSpace = $this->packageVendor.DIRECTORY_SEPARATOR.$this->packageName;
		}
	}
    // Check whether current laravel version is graeter than 5
	protected function registerCurrentDir()
	{
		if (isLaravel5())
		{
			$this->__DIR__ = $this->packageDir;
		}
	}

	/**
	 * Register the configuration object instance e.g app['ooglee-blog.config']
	 *
	 * @return void
	 */
	private function registerPackageConfig()
	{
		if (isLaravel5())
		{
	        $this->app->bindShared($this->packageName.'.config', function($app)
			{
				$configNameSpace = 'vendor.'.$this->packageVendor.'.'.$this->packageName.'.';
		        // Register the corresponding config for package
				return new $this->packageConfigClass($app['config'], $configNameSpace);
			});
			
		}

	}

	private function loadViews()
	{
		if (isLaravel5())
		{
			$viewsPubFolder = base_path().'/resources/views/vendor/'.$this->packageNameSpace;

			if (is_dir($viewsPubFolder)) 
			{
    			// The package views have been published - use those views.
    			$this->loadViewsFrom($viewsPubFolder, $this->packageName);
			} 
		    else 
		    {
		    	$viewsFolder = $this->__DIR__.'/../../../resources/views/';
				
		        // The package views have not been published. Use the defaults.
		        if (is_dir($viewsFolder))
				{
					$this->loadViewsFrom($viewsFolder, $this->packageName);
				}
		    }
		}
	}

	private function loadTranslations()
	{
		if (isLaravel5())
		{
			$langsPubFolder = base_path().'/resources/lang/vendor/'.$this->packageNameSpace;

			if (is_dir($langsPubFolder)) 
			{
    			// The package langs have been published - use those views.
    			$this->loadTranslationsFrom($langsPubFolder, $this->packageName);
			} 
		    else 
		    {
		    	$langsFolder = $this->__DIR__.'/../../../resources/lang/';
				
		        // The package langs have not been published. Use the defaults.
		        if (is_dir($langsFolder))
				{
					$this->loadTranslationsFrom($langsFolder, $this->packageName);
				}
		    }
		}
	}

	
}
