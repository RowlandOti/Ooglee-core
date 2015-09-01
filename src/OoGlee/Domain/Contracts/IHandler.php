<?php namespace Ooglee\Domain\Contracts;

use Ooglee\Domain\CommandBus\ICommand;

interface IHandler   {


	/**
	 * IHandler interface to be implemented in the application layer.
	 * 
	 */

	public function handle(ICommand $command);
	
}
