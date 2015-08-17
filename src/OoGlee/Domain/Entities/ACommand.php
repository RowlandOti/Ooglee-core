<?php namespace Ooglee\Domain\Entities;

abstract class ACommand {

	/**
	 * ACommand has a more generic default implementation
	 */

	/**
     * @var array
     */
    protected $data;

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function __get($property)
    {
        if( isset($this->data[$property]) )
        {
            return $this->data[$property];
        }

        return null;
    }
}
