@extends('layouts.tables')

@section('table')

    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Title</th>
            <th class="d-none d-sm-table-cell">Description</th>
            <th>User</th>
            <th>Client</th>
            <th style="width:11%;">Deadline</th>
            <th>Status</th>
            @if(auth()->user()->can('update_project') && auth()->user()->can('delete_project'))
                <th style="width: 10%;">Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @forelse ($projects as $project)
            <tr>
                <td class="text-center">{{ $project->id }}</td>
                <td class="fw-semibold"> {{ $project->title }} </td>
                <td class="d-none d-sm-table-cell"> {{$project->description}} </td>
                <td class="text-muted"> {{ $project->user->name  }} </td>
                <td class="text-muted"> {{ $project->client->name  }} </td>
                <td class="text-muted"> {{ $project->deadline  }} </td>
                <td class="text-muted" style="font-size: 0.8rem"> {!! $project->status->getLabelHTML()  !!} </td>
                @if(auth()->user()->can('update_project') && auth()->user()->can('delete_project'))
                    <td>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                            <i class="fa fa-pencil"></i> Edit Project
                        </a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete Project </button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="8">No Projects Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
