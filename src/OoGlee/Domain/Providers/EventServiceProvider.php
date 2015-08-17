<?php namespace Oogle\Domain\Providers;

use Ooglee\Domain\Events\UserRegisteredEvent;
use Ooglee\Application\Listeners\UserWasRegisteredListener;
use Ooglee\Application\Listeners\SendWelcomeMailListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array = ['event.name' => ['EventListener',],];
	 *  
	 */
	protected $listen = [
		
        UserRegisteredEvent::class => [
								        UserWasRegisteredListener::class,
								        SendWelcomeMailListener::class,
    								  ],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

	}

}
