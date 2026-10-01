<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreateBienNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $id;
     public $titre;
     public $prof;


     public function __construct($id , $titre , $prof)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->prof = $prof;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'id' =>$this->id,
            'titre' =>$this->titre,
            'prof' =>$this->prof,

        ];
    }
}
