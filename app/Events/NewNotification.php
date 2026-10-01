<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

     public $bien_id;
     public $titre;
     public $prof;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        $this->bien_id = $data['bien_id'];
        $this->titre = $data['titre'];
        $this->prof = $data['prof'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       return new Channel('new-notification');
    }

    /**
     * Nom de l'événement reçu par Pusher côté JavaScript
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'NewNotification';
    }
}
