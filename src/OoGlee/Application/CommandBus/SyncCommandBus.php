<?php namespace Ooglee\Application\Commands;

use Illuminate\Container\Container;
use Ooglee\Domain\Contracts\IInflector;
use Ooglee\Domain\Contracts\ICommandBus;

class SyncCommandBus extends ACommandBus implements ICommandBus {


	/**
	 * SynchronousCommandBus implementation 
	 * 
	 */

     /**
     * @var Illuminate\Container\Container
     */
    private $container;

    /**
     * @var CommandNameInflector
     */
    private $inflector;

	public function __construct(Container $container, IInflector $inflector)
    {
        $this->container = $container;
        $this->inflector = $inflector;
    }

    public function resolveHandler(ICommand $command)
    {
        return $this->container->make($this->inflector->inflect($command));
    }

	public function execute(ICommand $command)
    {
        return $this->resolveHandler($command)->handle($command);
    }
}
