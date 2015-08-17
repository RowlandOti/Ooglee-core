<?php namespace App\Ooglee\Domain\Contracts;


interface IListener   {


	/**
	 * IHandler interface to be implemented in the application layer.
	 * 
	 */

	public function listenerHandle(IEvent $event);
	
}
