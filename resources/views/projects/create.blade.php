@extends('layouts.forms.resource-controller.create', ['entity' => 'projects'])

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
        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" placeholder="JujukDate App">
        @error('title')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" placeholder="Some words about Project...">{{old('description')}}</textarea>
        @error('description')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Users</label>
        <select class="js-select2 form-select @error('user_ids') is-invalid @enderror " name="user_ids[]" style="width: 100%;" data-container="#modal-block-select2" data-placeholder="Choose many.." multiple>
            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
            @foreach($users as $user)
                <option value="{{$user->id}}"
                    @if(old('user_ids'))
                        @selected(in_array($user->id, old('user_ids')))
                    @endif
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
                <option value="{{$client->id}}" @selected(old('client_id') == $client->id)> {{$client->name}} </option>
            @endforeach
        </select>
        @error('client_id')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label class="form-label">Deadline</label>
        <input type="text" class="js-flatpickr form-control @error('deadline') is-invalid @enderror" value="{{old('deadline')}}" name="deadline" placeholder="Deadline" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y">
        @error('deadline')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>

@endsection
