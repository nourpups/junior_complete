@extends('layouts.backend')

@section('title', 'Notifications')

@section('content')

   <div class="content">
      <div class="block block-rounded">
         <div class="block-header block-header-default d-flex justify-content-between">
            <h3 class="block-title"> Notifications </h3>
         </div>
         <div class="block-content block-content-full">
            <table class="table table-bordered table-vcenter js-dataTable-buttons">
               <thead>
               <tr>
                  <th> Notification </th>
                  <th style="width: 10%;"> Actions </th>
               </tr>
               </thead>
               <tbody>
               @forelse ($notifications as $notification)
                  <tr @class(['opacity-50' => $unreadNotifications->doesntContain($notification)])>
                     <td class="fw-semibold">
                        @if(class_basename($notification->type) == 'NewProjectNotification')
                              @include('notifications.project', [
                                 'users' => join(', ', array_map(fn($user) => $user['name'], $notification->data['users']))
                                 ]) {{--output: Jhon, Downey, Ray --}}
                        @endif
                        @if(class_basename($notification->type) == 'NewTaskNotification')
                              @include('notifications.task')
                        @endif
                     </td>
                     <td>
                        @if($unreadNotifications->contains($notification))
                           <form action="{{ route('notifications.mark_as_read', $notification) }}" method="POST">
                              @csrf
                              <button class="btn btn-alt-success mb-1" style="font-size: 0.75rem">
                                 <i class="fa fa-check"></i> Mark as read
                              </button>
                           </form>
                        @else
                           <p class="text-success"> <i class="fa fa-check"></i> Read </p>
                        @endif
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td class="text-muted text-center" colspan="4">No Notifications Yet...</td>
                  </tr>
               @endforelse

               </tbody>
            </table>
         </div>
      </div>
   </div>

@endsection
