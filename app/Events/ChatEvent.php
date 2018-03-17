<?php

namespace App\Events;

use App\Models\UserAccount;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $receiver;
    public $message;

    public function __construct(UserAccount $sender, UserAccount $receiver, $message)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->dontBroadcastToCurrentUser();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
