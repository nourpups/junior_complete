@extends('layouts.tables')

@section('table')

    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Title</th>
            <th class="d-none d-sm-table-cell">Description</th>
            <th>User</th>
            <th>Project</th>
            <th style="width:11%;">Deadline</th>
            <th>Status</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tasks as $task)
            <tr>
                <td class="text-center">{{ $task->id }}</td>
                <td class="fw-semibold"> {{ $task->title }} </td>
                <td class="d-none d-sm-table-cell"> {{$task->description}} </td>
                <td class="text-muted"> {{ $task->user->name  }} </td>
                <td class="text-muted"> {{ $task->project->title  }} </td>
                <td class="text-muted"> {{ $task->deadline  }} </td>
                <td class="text-muted" style="font-size: 0.8rem"> {!! $task->status->getLabelHTML()  !!} </td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                        <i class="fa fa-pencil"></i> Edit Task
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete Task </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="8">No Tasks Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
