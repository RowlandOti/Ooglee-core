<?php namespace Ooglee\Domain\Entities\Eloquent;

use Ooglee\Domain\Entities\ABasePresenter;
use Ooglee\Domain\Entities\Eloquent\BaseEloquentModel;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class EloquentPresenter
 *
 * @link          http://skyllablers/ooglee-core
 * @author        AnomalyLabs, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowland@skyllabler.com>
 * @package       rowland\ooglee-core
 */
class EloquentPresenter extends ABasePresenter implements Arrayable
{

     /**
     * The resource object.
     * This is for IDE hinting.
     *
     * @var ABaseEloquentModel
     */
    protected $object;

    /**
     * Create a new EloquentPresenter instance.
     *
     * @param $object
     */
    public function __construct($object)
    {
        if ($object instanceof BaseEloquentModel) 
        {
            $this->object = $object;
        }
    }

    /**
     * Return the ID.
     *
     * @return mixed
     */
    public function id()
    {
        return $this->object->getKey();
    }

    /**
     * Return the object as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->object->toArray();
    }

    /**
     * Return the date string for created at.
     *
     * @return string
     */
    public function createdAtDate()
    {
        return $this->object->created_at->setTimezone(config('app.timezone'))->format(config('streams.date_format'));
    }

    /**
     * Return the datetime string for created at.
     *
     * @return string
     */
    public function createdAtDatetime()
    {
        return $this->object->created_at->setTimezone(config('app.timezone'))->format(config('streams.date_format') . ' ' . config('streams.time_format'));
    }

    /**
     * Return the date string for updated at.
     *
     * @return string
     */
    public function updatedAtDate()
    {
        return $this->object->updated_at->setTimezone(config('app.timezone'))->format(config('streams.date_format'));
    }

    /**
     * Return the datetime string for updated at.
     *
     * @return string
     */
    public function updatedAtDatetime()
    {
        return $this->object->updated_at->setTimezone(config('app.timezone'))->format(config('streams.date_format') . ' ' . config('streams.time_format'));
    }
}
