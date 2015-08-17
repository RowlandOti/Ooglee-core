<?php namespace App\Ooglee\Domain\Contracts;


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
