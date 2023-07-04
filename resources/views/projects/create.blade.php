@extends('layouts.forms.create', ['entity' => 'projects'])

@section('css')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <script>Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider', 'jq-masked-inputs', 'jq-pw-strength']);</script>
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
        <label class="form-label">User</label>
        <select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
            @foreach($users as $user)
                <option value="{{old('user_id', $user->id)}}" @selected(old('user_id') == $user->id)> {{$user->name}} </option>
            @endforeach
        </select>
        @error('user_id')
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
