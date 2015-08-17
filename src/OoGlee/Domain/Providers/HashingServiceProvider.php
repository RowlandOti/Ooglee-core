<?php namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\Contracts\IHashingService;

/**
* Register our service with Laravel
*/
class HashingServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace 'Ooglee\Domain\Contracts\IHashingService'
        $this->app->singleton('Ooglee\Domain\Contracts\IHashingService', function($app)
        {
            //$hasher = $this->app['config']['ioc.app.hasher'];
            $hasher = \Config::get('ooglee::ioc.app.hasher');
            //return new HashingService(new HasherExample());
            return new HashingService(new $hasher);
        });
    }
}