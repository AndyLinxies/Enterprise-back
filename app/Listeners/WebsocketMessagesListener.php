<?php

namespace App\Listeners;

use App\Events\WebsocketMessagesEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebsocketMessagesListener
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
     * @param  \App\Providers\WebsocketMessagesEvent  $event
     * @return void
     */
    public function handle(WebsocketMessagesEvent $event)
    {
        //
    }
}
