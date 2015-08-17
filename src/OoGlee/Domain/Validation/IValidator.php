<?php  namespace Ooglee\Domain\Validation;

use Ooglee\Domain\CommandBus\ICommand;

interface IValidator {

    public function validate(ICommand $command);
} 