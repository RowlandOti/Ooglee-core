<?php namespace Ooglee\Application\CommandBus;

use Ooglee\Domain\Contracts\IInflector;
use Ooglee\Domain\CommandBus\ICommand;

class CommandNameInflector implements IInflector {

	/**
	 * NameInflector implementation 
	 * 
	 */

    /**
     * Find a Handler Class for a Command
     *
     * @param Command $command
     * @return string
     */
    public function inflect(ICommand $command)
    {
        return str_replace('Command', 'Handler', get_class($command));
    }
	
}
