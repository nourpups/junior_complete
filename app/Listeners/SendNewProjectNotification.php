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
      $project = $event->project;
      $admins = User::role('Super Admin')->get();

      $isAdminPinned = $project->users->contains(function ($user) {
         return $user->hasRole('Super Admin');
      });

      Notification::send($event->users, new NewProjectNotification($project, $isAdminPinned));
      Notification::send($admins, new NewProjectNotification($project));
   }

}
