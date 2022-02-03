<?php

namespace App\Providers;

use App\Notifications\NewTacheNotification;
use App\Providers\AddTache;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewTacheNotification implements shouldQueue
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
     * @param  \App\Providers\AddTache  $event
     * @return void
     */
    public function handle(AddTache $event)
    {
        // dd($event->store);
        // dd($event->thisEntUser);
        Notification::send($event->thisEntUser, new NewTacheNotification($event->store));
    }
}
