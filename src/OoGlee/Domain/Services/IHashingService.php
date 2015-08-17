<?php namespace App\Ooglee\Domain\Services;

use Oogle\Domain\CommandBus\ICommandBus;


interface IHashingService   {


	/**
	 * IHashingService interface to be implemented in the application layer.
	 * 
	 */

	/**
     * Create a new hashed password
     *
     * @param Password $password
     * @return HashedPassword
     */
    public function hash(Password $password);
	
}
