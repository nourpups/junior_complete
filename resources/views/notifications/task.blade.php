[{{ $notification->created_at }}]
   @if (auth()->user()->hasAllRoles('Super Admin')) {{-- Admin, Moderator --}}
   User "{{ $notification->data['user']['name'] }}" has been pinned to the task
   "<i class="fa fa-tasks text-secondary fs-4"></i> {{ $notification->data['task']['title'] }}"
   in the project
   "<i class="fa fa-diagram-project text-secondary fs-4"></i> {{ $notification->data['task']['project'] }}"
   @endif

   @if(auth()->user()->hasAnyRole('User')) {{-- Editor, Manager--}}
      You have been pinned to the task
      "<i class="fa fa-tasks text-secondary fs-4"></i> {{ $notification->data['task']['title'] }}"
      in the project
      "<i class="fa fa-diagram-project text-secondary fs-4"></i> {{ $notification->data['task']['project'] }}"
   @endif





