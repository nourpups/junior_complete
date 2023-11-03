[{{ $notification->created_at }}]

@if (auth()->user()->hasAllRoles('Super Admin') &&
 auth()->user()->name !== $notification->data['user']['name'])
    {{-- Admin, Moderator --}}
    @include('notifications.messages.admin.task')
@else
    @include('notifications.messages.user.task')
@endif

@if(auth()->user()->hasAnyRole('User'))
    {{-- Editor, Manager--}}
    @include('notifications.messages.user.task')
@endif





