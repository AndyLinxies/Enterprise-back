<?php

namespace App\Providers;

use App\Events\AddTache;
use App\Events\NewUserEvent;
use App\Events\RecapTachesEvent;
use App\Events\WebsocketMessagesEvent;
use App\Listeners\NewUserNotificationListener;
use App\Listeners\RecapTachesNotificationListener;
use App\Listeners\SendNewTacheNotification;
use App\Listeners\WebsocketMessagesListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AddTache::class => [
            SendNewTacheNotification::class,
        ],
        NewUserEvent::class => [
            NewUserNotificationListener::class,
        ],
        RecapTachesEvent::class => [
            RecapTachesNotificationListener::class,
        ],
        WebsocketMessagesEvent::class => [
            WebsocketMessagesListener::class,
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
