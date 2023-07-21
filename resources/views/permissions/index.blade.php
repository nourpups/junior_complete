@extends('layouts.tables.resource-controller', ['entity' => 'permissions'])

@section('table')

    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($permissions as $permission)
            <tr>
                <td class="text-center">{{ $permission->id }}</td>
                <td class="fw-semibold"> {{ $permission->name }} </td>
                <td>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                        <i class="fa fa-pencil"></i> Edit Permission
                    </a>
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete Permission </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="4">No Permission Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
