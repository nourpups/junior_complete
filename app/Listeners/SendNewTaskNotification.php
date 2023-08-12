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
       $task = $event->task;
       $admins = User::role('Super Admin')->when($task->user->hasRole('Super Admin'), function ($query) {
          return $query->where('id', '!=', auth()->id());
       })->get();

       $event->user->notify(new NewTaskNotification($task));
       Notification::send($admins, new NewTaskNotification($task));
    }
}
