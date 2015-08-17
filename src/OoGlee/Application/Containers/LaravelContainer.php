<?php namespace App\Ooglee\Application\Containers;

use App\Ooglee\Domain\Contracts\ICommandBus;
use Illuminate\Container\Container as IoC;

class LaravelContainer extends AContainer implements IContainer {

	/**
	 * LaravelContainer implementation 
	 * 
	 */

    /**
     * @var Container
     */
    private $container;
 
    /**
     * Create a new LaravelContainer
     *
     * @param IoC $container
     * @return void
     */
    public function __construct(IoC $container)
    {
        $this->container = $container;
    }
 
    /**
     * Resolve the class out of the Container
     *
     * @param string $class
     * @return mixed
     */
    public function make($class)
    {
        return $this->container->make($class);
    }
	
}
