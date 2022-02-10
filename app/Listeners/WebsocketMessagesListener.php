<?php

namespace App\Listeners;

use App\Events\WebsocketMessagesEvent;
use App\Notifications\MessageNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class WebsocketMessagesListener implements shouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\WebsocketMessagesEvent  $event
     * @return void
     */
    public function handle(WebsocketMessagesEvent $event)
    {
        // var_dump($event->user);
        Notification::send($event->user, new MessageNotification($event->message));
    }
}
