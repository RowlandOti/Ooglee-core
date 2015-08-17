<?php namespace App\Ooglee\Domain\Contracts;


interface IHandler   {


	/**
	 * IHandler interface to be implemented in the application layer.
	 * 
	 */

	public function handle(ICommandBus $command);
	
}
