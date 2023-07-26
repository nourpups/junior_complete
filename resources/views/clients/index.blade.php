@extends('layouts.tables.resource-controller', ['entity' => 'clients'])



@section('table')
{{--{{dd(session()->all())}}--}}
    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell">Email</th>
            <th>Company Name</th>
            <th>Company City</th>
            <th>Company Address</th>
            <th style="width: 10%;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($clients as $client)
            <tr>
                <td class="text-center">{{ $client->id }}</td>
                <td class="fw-semibold"> {{ $client->name }} </td>
                <td class="d-none d-sm-table-cell"> {{$client->email}} </td>
                <td class="text-muted"> {{ $client->company_name  }} </td>
                <td class="text-muted"> {{ $client->company_city  }} </td>
                <td class="text-muted"> {{ $client->company_address  }} </td>
                <td>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-alt-warning mb-1" style="font-size: 0.75rem">
                        <i class="fa fa-pencil"></i> Edit Client
                    </a>

                    <form action="{{ route('clients.destroy', $client) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-alt-danger" style="font-size: 0.75rem"> <i class="fa fa-trash"></i> Delete Client </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="6">No Clients Yet...</td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
