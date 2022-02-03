<?php

namespace App\Providers;

use App\Notifications\WelcomeEmailNotification;
use App\Providers\NewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $event->user->notify(new WelcomeEmailNotification());
    }
}
