<?php  namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\CommandBus\ICommandBus;
use Ooglee\Application\CommandBus\CommandNameInflector;
use Ooglee\Application\CommandBus\SyncCommandBus;

class SyncCommandBusServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Ooglee\Domain\CommandBus\ICommandBus', function()
        {
            return new SyncCommandBus($this->app, new CommandNameInflector());
        });
    }
} 