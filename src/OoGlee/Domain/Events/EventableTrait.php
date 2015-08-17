<?php namespace Ooglee\Domain\Events;

use Ooglee\Domain\Events\IEvent;

trait EventableTrait {

    /**
     * @var array
     */
    protected $queuedEvents;

    /**
     * Record that an event as occurred
     *
     * @param $event
     * @return void
     */
    public function recordEvents(IEvent $event)
    {
        $this->queuedEvents[] = $event;
    }

    /**
     * Release the pending events
     *
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->queuedEvents;
        $this->queuedEvents = [];

        return $events;
    }
} 