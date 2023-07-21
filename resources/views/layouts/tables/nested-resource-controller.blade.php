@extends('layouts.backend')

@section('title', $title.' Table')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-between">
                <h3 class="block-title">
                    {{ $title }} Table
                </h3>
                <div class="actions">
                    <a href="{{ route($preRouteName.'.create', $routeParameter) }}" class="btn btn-alt-primary d-inline-block">
                        <i class="fa fa-plus"></i> Create {{ str($title)->explode(' ')->last() }}
                    </a>
                    <a href="{{ route($preRouteName.'.add_form', $routeParameter) }}" class="btn btn-alt-primary d-inline-block">
                        <i class="fa fa-plus"></i> Add {{ str($title)->explode(' ')->last() }}
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">

                @yield('table')

                {{ ${str($entity)}->links() }}
            </div>
        </div>
    </div>


@endsection
