<?php

namespace App\Notifications;

use App\Models\Entreprise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecapSoirNotification extends Notification
{
    use Queueable;

    protected $ent; //1 Recuperation

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(object $ent)
    {
        $this->ent=$ent;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        //Ceci est un array de taches de l'entreprise sur lequel on va boucler dans la view
        $myTache=$this->ent->tache; //tache ici vient du model

        return (new MailMessage)
                    ->view('partials.notification',compact('myTache'));
                
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
