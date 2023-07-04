@extends('layouts.forms.create', ['entity' => 'clients'])

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
                <label class="form-label" >Company Name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Jujuksoft Fapnologies">
                @error('company_name')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label" >Company City</label>
                <input type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" placeholder="Jujukiston">
                @error('company_city')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Company Address</label>
                 <input type="text" class="form-control @error('company_address') is-invalid @enderror" name="company_address" placeholder="LuniKingus ko'chasi, 69">
                @error('company_address')
                <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
                @enderror
            </div>

@endsection
