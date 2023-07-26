@extends('layouts.forms.resource-controller.create', ['entity' => 'users'])

@section('form')

            <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Jujuk ShoTag'ovich">
                @error('name')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="jujuk18point6sm@gmail.com">
                @error('email')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label" >Password</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="JujukParol000">
                @error('password')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>

@endsection
