@extends('layouts.tables.resource-controller', ['entity' => 'roles'])

@section('table')

    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th style="width: 15%;">Role Permissions</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($roles as $role)
            <tr>
                <td class="text-center">{{ $role->id }}</td>
                <td class="fw-semibold"> {{ $role->name }} </td>
                <td class="fw-semibold text-center">
                    <a style="font-size: 0.75rem" href="{{route('roles.permissions.index', $role)}}" class="btn btn-info">Permissions</a>
                </td>
                <td>
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                        <i class="fa fa-pencil"></i> Edit Roles
                    </a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete Roles </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="4">No Roles Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
