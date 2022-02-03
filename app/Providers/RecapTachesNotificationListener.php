<?php

namespace App\Providers;

use App\Models\Entreprise;
use App\Models\User;
use App\Notifications\RecapSoirNotification;
use App\Providers\RecapTachesEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class RecapTachesNotificationListener implements shouldQueue
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
     * @param  \App\Providers\RecapTachesEvent  $event
     * @return void
     */
    public function handle(RecapTachesEvent $event)
    {
        $entreprise=Entreprise::all();
        foreach ($entreprise as $ent) {
        $user=User::find($ent->user_id);
        Notification::send($user, new RecapSoirNotification($ent));
        }
    }
}
