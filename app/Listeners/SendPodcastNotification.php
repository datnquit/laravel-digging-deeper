<?php

namespace App\Listeners;

use App\Events\PodcastProcessed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPodcastNotification implements ShouldQueue
{
    use Queueable;
    use InteractsWithQueue;

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
     * @param  PodcastProcessed  $event
     * @return void
     */
    public function handle(PodcastProcessed $event)
    {
        Log::info('Hello: ' . $event->name, [
            'user' => $event->user
        ]);
    }

    public function failed(PodcastProcessed $event, $exc)
    {

    }
}
