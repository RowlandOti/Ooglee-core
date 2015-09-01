<?php namespace Ooglee\Application\CommandBus;

use Ooglee\Domain\Contracts\IInflector;
use Ooglee\Domain\CommandBus\ICommand;
use ReflectionClass;

class CommandNameInflector implements IInflector {

	/**
	 * NameInflector implementation 
	 * 
	 */

    /**
     * Map a Handler Class for corresponding Command
     *
     * @param Command $command
     * @return string
     */
    public function inflect(ICommand $command)
    {
        $tmpClass = str_replace('Domain', 'Application', get_class($command));
        $handlerClass = str_replace('Command', 'Handler', $tmpClass);

        return $handlerClass;
    }
}
