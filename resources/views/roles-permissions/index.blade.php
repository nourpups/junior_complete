@extends('layouts.tables.nested-resource-controller', [
      'title' => 'Role Permissions',
      'entity' => 'rolePermissions',
      'preRouteName' => 'roles.permissions',
      'routeParameter' => $role])

@section('table')
    <div class="form-header mb-3">
        <a href="{{session('parent_index_page')}}" class="btn btn-alt-secondary"> <i class="fa fa-arrow-left"></i> Back </a>
    </div>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($rolePermissions as $rolePermission)
            <tr>
                <td class="text-center">{{ $rolePermission->id }}</td>
                <td class="fw-semibold"> {{ $rolePermission->name }} </td>
                <td>
                    <form action="{{ route('roles.permissions.destroy', [$role, $rolePermission]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Revoke Permission </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted text-center" colspan="4">No Permissions Related To This Role Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
