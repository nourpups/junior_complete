@extends('layouts.forms.resource-controller.edit', ['entity' => 'projects', 'title' => $project->title])

@section('css')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-select2']);</script>
@endsection

@section('form')

    <div class="mb-4">
        <label class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title', $project->title)}}" placeholder="JujukDate App">
        @error('title')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" placeholder="if Jujuk/Poppi nice, swipe left else right...">{{old('description', $project->description)}}</textarea>
        @error('description')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Users</label>
        <select class="js-select2 form-select @error('user_ids') is-invalid @enderror " name="user_ids[]" style="width: 100%;" data-container="#modal-block-select2" data-placeholder="Choose many.." multiple>
            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
            @foreach($users as $user)
                <option value="{{old('user_ids', $user->id)}}"
                    @foreach($project->users as $projectUser)
                        {{$user->id == $projectUser->id ? 'disabled' : ''}}
                    @endforeach
                >
                {{$user->name}}
                </option>
            @endforeach
        </select>
        @error('user_ids')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Client</label>
        <select class="form-select @error('client_id') is-invalid @enderror" name="client_id">
            @foreach($clients as $client)
                <option value="{{$client->id}}" @selected(old('client_id', $project->client_id) == $client->id)>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
        @error('client_id')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label class="form-label">Deadline</label>
        <input type="text" class="js-flatpickr form-control" name="deadline" placeholder="Deadline" data-default-date="{{old('deadline', $project->deadline)}}" data-date-format="F j, Y">
        @error('deadline')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">

        <label class="form-label">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" name="status">
            @foreach($project->status->cases() as $status)
                <option value="{{$status}}" @selected(old('status', $project->status) == $status)>
                {{ $status }}
                </option>
            @endforeach
        </select>
        @error('status')
        <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

@endsection
