<?php namespace Ooglee\Domain\CommandBus;

use Ooglee\Domain\CommandBus\ICommand;


interface ICommandBus   {


	/**
	 * ICommandBus interface to be implemented by the application layer.
	 * 
	 */

	public function execute(ICommand $command);
	
}
