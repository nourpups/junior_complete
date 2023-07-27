<?php

namespace App\Listeners;

use App\Events\PinTaskToUser;
use App\Models\User;
use App\Notifications\NewTaskNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewTaskNotification
{
    /**
     * Handle the event.
     */
    public function handle(PinTaskToUser $event): void
    {
       $event->user->notify(new NewTaskNotification($event->task));

       $superAdmins = User::role('Super Admin')->get();
       Notification::send($superAdmins, new NewTaskNotification($event->task));
    }
}
