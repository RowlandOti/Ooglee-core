<?php namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\Entities\User\IUserRepository;
use Ooglee\Domain\Entities\User\Repositories\UserEloquentRepository;

/**
* Register our Repository with Laravel
*/
class UserServiceProvider extends ServiceProvider {

    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace 'Ooglee\Domain\Entities\User\IUserRepository'
        $this->app->bind('Ooglee\Domain\Entities\User\IUserRepository', function($app)
        {
            //$model = $this->app['config']['ioc.app.post_model'];
            $model = \Config::get('ooglee::ioc.app.user_model');
            //return new UserEloquentRepository(new HasherExample());
            return new UserEloquentRepository(new $model);
        });
    }
}