@extends('layouts.backend') {{-- все переменние идут от дочерних template --}}

@section('title', 'Add '. $title)

@section('content')
   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
   <div class="content d-flex justify-content-center">
      <form class="w-75" action="{{ route($preRouteName.'.add', $routeParameters) }}" method="POST">
         @csrf
         <div class="form-header mb-3">
            <a href="{{session('index_page')}}" class="btn btn-alt-secondary"> <i class="fa fa-arrow-left"></i> Back </a>
            <h1 class="d-inline-block float-end">Add {{ str($title)->singular() }}</h1>
         </div>

         @yield('form')

         <button class="btn btn-primary w-25"> <i class="fa fa-plus"></i> Add {{ $title }}</button>
      </form>
   </div>

@endsection
