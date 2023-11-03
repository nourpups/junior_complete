[{{ $notification->created_at }}]

@if (auth()->user()->hasAllRoles('Super Admin') &&
     !$notification->data['is_admin_pinned']) {{-- Admin, Moderator --}}
    @include('notifications.messages.admin.project')
@else
    @include('notifications.messages.user.project')
@endif

@if(auth()->user()->hasAnyRole('User')) {{-- Editor, Manager--}}
    @include('notifications.messages.user.project')
@endif
