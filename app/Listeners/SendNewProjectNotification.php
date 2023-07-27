<?php

namespace App\Listeners;

use App\Events\UserPinned;
use App\Notifications\NewProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendNewProjectNotification
{
    /**
     * Handle the event.
     */
    public function handle(UserPinned $event): void
    {
        Notification::send($event->users, new NewProjectNotification($event->users, $event->entityOfPinning));
    }
}
