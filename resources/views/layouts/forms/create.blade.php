@extends('layouts.backend') {{-- $title и $entity идут от дочерних template --}}

@section('title', 'Add '. str($entity)->singular())

@section('content')
    <div class="content d-flex justify-content-center">
        <form class="w-75" action="{{ route($entity.'.store') }}" method="POST">
            @csrf
            <div class="form-header mb-3">
                <a href="{{session('index_page')}}" class="btn btn-alt-secondary"> <i class="fa fa-arrow-left"></i> Back </a>
                <h1 class="d-inline-block float-end">Add {{ str($entity)->singular() }}</h1>
            </div>

            @yield('form')

            <button class="btn btn-primary w-25"> <i class="fa fa-plus"></i> Add {{ str($entity)->singular() }}</button>
        </form>
    </div>

@endsection
