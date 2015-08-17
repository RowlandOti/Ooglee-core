<?php namespace Ooglee\Domain\Validation;

use Exception;
use Illuminate\Support\MessageBag;

class ValidationException extends Exception {

    /**
     * @var MessageBag
     */
    protected $errors;

    public function __construct(MessageBag $errors, $message='', $code=0, $previous=null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    public function getErrors()
    {
        return $this->errors;
    }

}