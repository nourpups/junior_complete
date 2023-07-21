@extends('layouts.forms.resource-controller.edit', ['entity' => 'roles', 'title' => $role->name])

@section('form')
    <div class="mb-4">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $role->name)}}" name="name" placeholder="Starshiy Jujuk">
        @error('name')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
@endsection
