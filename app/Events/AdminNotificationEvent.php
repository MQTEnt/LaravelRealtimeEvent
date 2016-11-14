<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AdminNotificationEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Init...
         $this->data = [
            'idProduct' => 'none',
            'msg' => 'none'
        ];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['admin-notification-channel'];
    }

    public function updateProductEvent($idProduct, $message)
    {
        //When user update product, $data will be asigned...
        $this->data = [
            'idProduct' => $idProduct,
            'msg' => $message
        ];
    }
}
