<?php namespace Ooglee\Infrastructure\Presenter\Contracts;

interface IPresentable {

	/**
	 * Prepare a new or cached presenter instance
	 *
	 * @return mixed
	 */
	public function present();

} 