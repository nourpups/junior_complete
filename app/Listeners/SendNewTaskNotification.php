<?php

namespace App\Listeners;

use App\Events\UserPinned;
use App\Notifications\NewProjectNotification;
use App\Notifications\NewTaskNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewTaskNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserPinned $event): void
    {
       Notification::send($event->users, new NewTaskNotification($event->users, $event->entityOfPinning));
    }
}
