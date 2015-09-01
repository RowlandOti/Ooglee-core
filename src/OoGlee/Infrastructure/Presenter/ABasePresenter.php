<?php namespace Ooglee\Infrastructure\Presenter;

abstract class ABasePresenter {

	/**
	 * @var mixed
	 */
	protected $entity;

	/**
	 * @param $entity
	 */
	function __construct($entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Allow for property-style retrieval
	 *
	 * @param $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return $this->{$property}();
		}

		return $this->entity->{$property};
	}

	/**
     * Pass any unknown variable calls to present{$variable} or fall through to the injected object.
     *
     * @param  string $property
     * @return mixed
     */
    public function __get($property)
    {
        if ($method = $this->getPresenterMethodFromVariable($property)) {
            return $this->$method();
        }

        // Check the presenter for a getter.
        if (method_exists($this, camel_case('get_' . $property))) {
            return call_user_func_array([$this, camel_case('get_' . $property)], []);
        }

        // Check the presenter for a method.
        if (method_exists($this, camel_case($property))) {
            return call_user_func_array([$this->entity, camel_case($property)], []);
        }

        // Check the object for a getter.
        if (method_exists($this->entity, camel_case('get_' . $property))) {
            return call_user_func_array([$this->entity, camel_case('get_' . $property)], []);
        }

        // Check the object for a getter.
        if (method_exists($this->entity, camel_case('is_' . $property))) {
            return call_user_func_array([$this->entity, camel_case('is_' . $property)], []);
        }

        // Check the object for a method.
        if (method_exists($this->entity, camel_case($property))) {
            return call_user_func_array([$this->entity, camel_case($property)], []);
        }

        try {
            // Lastly try generic property access.
            return $this->__getDecorator()->decorate(is_array($this->entity) ? $this->entity[$property] : $this->entity->$property);
        } catch (\Exception $e) {
            // Don't do anything.
        }
    }

    /**
     * Get the object.
     *
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Fetch the presenter method name for the given variable.
     *
     * @param  string $variable
     * @return string|null
     */
    protected function getPresenterMethodFromVariable($variable)
    {
        $method = camel_case($variable);

        if (method_exists($this, $method)) 
        {
            return $method;
        }
    }

    /**
     * Return the objects string method.
     *
     * @return string
     */
    function __toString()
    {
        if (method_exists($this->entity, '__toString')) {
            return $this->entity->__toString();
        }

        parent::__toString();
    }

} 