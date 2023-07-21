@extends('layouts.forms.resource-controller.edit', ['entity' => 'permissions', 'title' => $permission->name])

@section('form')
    <div class="mb-4">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $permission->name)}}" name="name" placeholder="view_Jujuk">
        @error('name')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
@endsection
