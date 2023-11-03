@extends('layouts.backend') {{-- $title и $entity идут от дочерних template --}}

@section('title', 'Edit '. $user->name)

@section('content')
   <div class="content d-flex flex-column align-items-center">
      <form class="w-75" action="{{ route('profiles.update.profile', $user) }}" enctype="multipart/form-data" method="POST">
         @csrf
         @method('PUT')

         <div class="form-header mb-3">
            <a href="{{session('index_page', route('dashboard'))}}" class="btn btn-secondary">
               <i class="fa fa-arrow-left"></i>
               Back
            </a>
            <h1 class="d-inline-block float-end">
               <span class="text-muted">Edit</span>
               {{ $user->name }} Profile
            </h1>
         </div>

         <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="jujuk18point6sm@gmail.com">
            @error('email')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
            @enderror
         </div>
         <div class="mb-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder="Jujuk ShoTag'ovich">
            @error('name')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
            @enderror
         </div>
         <div class="mb-4 d-flex align-items-center">
            <div class="w-75">
               <label class="form-label">Avatar</label>
               <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
               @error('image')
               <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
               @enderror
            </div>
            <div class="text-center w-25">
               <img class="img-avatar img-avatar96" src="{{$user->getFirstMediaUrl('avatar')}}" alt="">
            </div>
         </div>
         <button class="btn btn-primary w-25">
            <i class="fa fa-pen"></i>
            Update Profile
         </button>
      </form>
      <form class="w-75" action="{{ route('profiles.update.password', $user) }}" method="POST">
         @csrf
         @method('PUT')

         <div class="form-header d-flex justify-content-end">
            <h1 class="ml-auto">
               <span class="text-muted">Edit</span>
               Password
            </h1>
         </div>
         <div class="mb-4">
            <label class="form-label">Old Password</label>
            <input type="text" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="JujukParol000">
            @error('current_password')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
            @enderror
         </div>
         <div class="mb-4">
            <label class="form-label">New Password</label>
            <input type="text" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="NewJujukParol000New">
            @error('new_password')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
            @enderror
         </div>
         <button class="btn btn-primary w-25">
            <i class="fa fa-pen"></i>
            Update Password
         </button>
      </form>
   </div>

@endsection
