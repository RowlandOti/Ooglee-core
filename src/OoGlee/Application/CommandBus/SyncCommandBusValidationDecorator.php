<?php namespace App\Ooglee\Application\Commands;

use Illuminate\Container\Container;
use Ooglee\Domain\Contracts\IInflector;
use App\Ooglee\Domain\Contracts\ICommandBus;

class SyncCommandBusValidationDecorator implements ICommandBus {


	/**
	 * SynchronousCommandBusValidationDecorator implementation 
	 * 
	 */

     /**
     * @var \Illuminate\Container\Container
     */
    private $container;

    /**
     * @var CommandNameInflector
     */
    private $inflector;

	public function __construct(Container $container, IInflector $inflector, ICommandBus $bus)
    {
        $this->bus = $bus;
        $this->container = $container;
        $this->inflector = $inflector;
    }

    public function validate(ICommand $command)
    {
        $validator = $this->container->make($this->inflector->inflect($command));
        $validator->validate($command); // Throws exception if invalid
    }

    public function execute(ICommand $command)
    {
        $this->validate($command);
        return $this->bus->execute($command);
    }
}
