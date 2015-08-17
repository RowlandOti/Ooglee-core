<?php namespace Ooglee\Domain\Contracts;
 
 
  interface IBaseRepository {

  	/**
	 * Each Repository class would extend a BaseRepository class which 
	 * implements IBaseRepository
	 */
    public function save($model);
  }