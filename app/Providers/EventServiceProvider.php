<?php

namespace App\Providers;

use App\Events\PodcastProcessed;
use App\Listeners\SendPodcastNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\DemoEvent;
use App\Listeners\DemoListener;
use Illuminate\Support\Facades\Log;
use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DemoEvent::class => [
            DemoListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        Event::listen(
//            PodcastProcessed::class,
//            [SendPodcastNotification::class, 'handle']
//        );

        Event::listen(PodcastProcessed::class, SendPodcastNotification::class);
//        Event::listen(queueable(function (PodcastProcessed $event) {
//            Log::info('hello');
//        })->catch(function (PodcastProcessed $event, \Throwable $e) {
//
//        })
//        );

    }

//    public function shouldDiscoverEvents()
//    {
//        return true;
//    }
}
