<?php namespace Ooglee\Infrastructure\Config\Facades;

use Illuminate\Support\Facades\Facade;

class OogleeBreadCrumbConfigFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() 
	{ 
		return 'ooglee-breadcrumb.config'; 
	}

}
