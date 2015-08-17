<?php namespace Ooglee\Domain\CommandBus;

use Ooglee\Domain\CommandBus\ICommandBus


interface ICommandBus   {


	/**
	 * ICommandBus interface to be implemented by the application layer.
	 * 
	 */

	public function execute(ICommandBus $command);
	
}
