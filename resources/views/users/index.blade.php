@extends('layouts.tables')



@section('table')

    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell">Email</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td class="text-center">{{ $user->id }}</td>
                <td class="fw-semibold"> {{ $user->name }} </td>
                <td class="d-none d-sm-table-cell"> {{$user->email}} </td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                        <i class="fa fa-pencil"></i> Edit User
                    </a>

                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete User </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="4">No Users Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
