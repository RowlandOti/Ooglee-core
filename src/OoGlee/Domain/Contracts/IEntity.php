<?php namespace Ooglee\Domain\Contracts;
 
interface IEntity
{

    /**
     * IEntity defines all entities uniquely
     */

    /**
     * Return the Entity identifer
     *
     * @return Identifier
     */
    public function id();
}