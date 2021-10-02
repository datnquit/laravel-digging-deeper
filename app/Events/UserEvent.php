<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('user.' . $this->user->id);
        return new Channel('user.' . $this->user->id);
//        return new PresenceChannel('user.' . $this->user->id);
    }

//    public function broadcastAs()
//    {
//        return "datdeptrai";
//    }

    public function broadcastWith()
    {
        return [
            'user' => $this->user,
        ];
    }

//    public function broadcastWhen()
//    {
//        return $this->user->gender == 'male';
//    }
}
