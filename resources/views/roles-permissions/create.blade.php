@extends('layouts.forms.nested-resource-controller.create', [
      'entity' => 'permission',
      'preRouteName' => 'roles.permissions',
      'routeParameters' => $role])

@section('form')
    <div class="mb-4">
        <label class="form-label">Title</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="view_Jujuk">
        @error('name')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
@endsection
