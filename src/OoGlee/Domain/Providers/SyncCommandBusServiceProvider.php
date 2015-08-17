<?php  namespace Ooogle\Domain\Providers;

use Illuminate\Support\ServiceProvider;

class SyncCommandBusServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Ooglee\Application\CommandBus\SyncCommandBus', function()
        {
            return new SyncCommandBus($this->app, new NameInflector);
        });
    }
} 