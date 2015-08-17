<?php namespace App\Ooglee\Domain\Contracts;


interface IEvent   {


	/**
	 * IEvent interface to be implemented .
	 * 
	 */

	/**
     * Return the event name
     * @return string
     */
    public function getName();
	
}
