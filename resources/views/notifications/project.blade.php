[{{ $notification->created_at }}]
   @if (auth()->user()->hasAllRoles('Super Admin')) {{-- Admin, Moderator --}}
      The user(s) "{{ $users }}" have/has been pinned to the project
      "<i class="fa fa-diagram-project text-secondary fs-4"></i> {{ $notification->data['project']}}"
   @endif

   @if(auth()->user()->hasAnyRole('User')) {{-- Editor, Manager--}}
      You have been pinned to the project
      "<i class="fa fa-diagram-project text-secondary fs-4"></i> {{ $notification->data['project'] }}"
   @endif
