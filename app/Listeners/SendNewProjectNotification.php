<?php

namespace App\Listeners;

use App\Events\PinUserToProject;
use App\Models\User;
use App\Notifications\NewProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendNewProjectNotification
{

   /**
    * Handle the event.
    */
   public function handle(PinUserToProject $event): void
   {
      $admins = User::role('Super Admin')->get();
      Notification::send($admins, new NewProjectNotification($event->project));

      Notification::send($event->users, new NewProjectNotification($event->project));
   }

}
