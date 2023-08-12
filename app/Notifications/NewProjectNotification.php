<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProjectNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $project, public $isAdminPinned = false)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
      $userDetails = $this->project->users->map(fn($user) => [
//            'id' => $user->id,
            'name' => $user->name,
      ]);
        return [
            'project' => $this->project->title,
            'users' => $userDetails,
            'is_admin_pinned' => $this->isAdminPinned
        ];
    }
}
