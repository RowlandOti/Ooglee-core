<?php namespace Oogle\Domain\Entities\Eloquent;

use Eloquent;
use Oogle\Domain\Contracts\IBaseRepository;
 
abstract class AEloquentBaseRepository implements IBaseRepository {

	/**
	* The Abstract ABaseRepository provides default implementations of the methods defined
	* in the IBaseRepository interface. These simply delegate static function calls
	* to the right eloquent model based on the $modelClassName.
	*/

	protected $modelClassInstance;

	public function __construct(Eloquent $modelClassInstance)
	{
		$this->modelClassInstance = $modelClassInstance;
    }

	public function getAll(array $related = null)
	{
		$related = $this->modelClassInstance->all();

        return $related;
	}

	public function getById($id, array $related = null)
	{
		$related = $this->modelClassInstance->find($id);

        return $related;
	}

	public function getWhere($column, $value, array $related = null)
	{

        $related = $this->modelClassInstance->where($column, '=', $value);

        return $related;
    }

    public function getRecent($limit, array $related = null)
    {

    }

    public function save(Eloquent $modelClassInstance)
    {
        return $modelClassInstance->save();
    }
}