<?php namespace Ooglee\Domain\Contracts;

use Ooglee\Domain\CommandBus\ICommand;

interface IInflector   {


	/**
	 * Inflector interface to be implemented in the application layer.
	 * 
	 */

	/**
     * Find a Handler for a Command
     *
     * @param Command $command
     * @return string
     */
    public function inflect(ICommand $command);
	
}
