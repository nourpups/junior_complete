<?php

namespace App\Http\Controllers;

use App\Actions\CheckAdminPinnedAction;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{

   public function index()
   {
      $user = auth()->user();
      $notifications = $user->notifications;
      $unreadNotifications = $user->unreadNotifications;

      return view('notifications.index', compact('notifications', 'unreadNotifications'));
   }

   public function markAsRead(DatabaseNotification $notification)
   {
      $notification->markAsRead();

      return to_route('notifications.index');
   }

   public function markAllAsRead()
   {
      auth()->user()->unreadNotifications->markAsRead();
   }

}
