<?php  namespace Oogle\Application\CommandBus; 

use Illuminate\Support\ServiceProvider;
use Oogle\Domain\CommandBus\ICommandBus;
use Oogle\Application\CommandBus\SyncCommandBus;
use Oogle\Domain\CommandBus\CommandNameInflector;

class CommandBusServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Oogle\Domain\CommandBus\ICommandBus', function()
        {
            return new SyncCommandBus($this->app, new CommandNameInflector);
        });
    }
} 