<?php namespace Ooglee\Infrastructure\Presenter\Eloquent;

use Ooglee\Infrastructure\Presenter\ABasePresenter;
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
abstract class EloquentPresenter extends ABasePresenter implements Arrayable
{

    /**
     * Return the ID.
     *
     * @return mixed
     */
    public function id()
    {
        return $this->entity->getKey();
    }

    /**
     * Return the entity as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->entity->toArray();
    }

    /**
     * Return the date string for created at.
     *
     * @return string
     */
    public function createdAtDate()
    {
        return $this->entity->created_at->diffForHumans();
    }

    /**
     * Return the datetime string for created at.
     *
     * @return string
     */
    public function createdAtDatetime()
    {
        return $this->entity->created_at->setTimezone($this->config->get('config.timezone'))
                                        ->format($this->config->get('config.date_format') . ' ' . $this->config->get('config.time_format'));
    }

    /**
     * Return the date string for updated at.
     *
     * @return string
     */
    public function updatedAtDate()
    {
        return $this->entity->updated_at->setTimezone($this->config->get('config.timezone'))
                                        ->format($this->config->get('config.date_format'));
    }

    /**
     * Return the datetime string for updated at.
     *
     * @return string
     */
    public function updatedAtDatetime()
    {
        return $this->entity->updated_at->setTimezone($this->config->get('config.timezone'))
                                        ->format($this->config->get('config.date_format') . ' ' . $this->config->get('config.time_format'));
    }
}
