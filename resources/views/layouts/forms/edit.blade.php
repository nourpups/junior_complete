@extends('layouts.backend') {{-- $title и $entity идут от дочерних template --}}

@section('title', 'Edit '. $title)

@section('content')

    <div class="content d-flex justify-content-center">
        <form class="w-75" action="{{ route($entity.'.update', ${str(request()->segment(1))->singular()}) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-header mb-3">
                <a href="{{session('previous_page')}}" class="btn btn-secondary"> <i class="fa fa-arrow-left"></i> Back </a>
                <h1 class="d-inline-block float-end">
                    <span class="text-muted">Edit</span>
                    {{ $title}}
                </h1>
            </div>

            @yield('form')

            <button class="btn btn-primary w-25"> <i class="fa fa-pen"></i> Update {{ str($entity)->singular() }}</button>
        </form>
    </div>

@endsection
