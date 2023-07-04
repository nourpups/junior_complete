@extends('layouts.backend')

@section('title', str(request()->segment(1))->ucfirst().' Table')

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-between">
                <h3 class="block-title">
                    {{ str(request()->segment(1))->ucfirst() }} Table {{-- <small>Export Buttons</small> --}}
                </h3>
                <a href="{{ route(request()->segment(1) . '.create') }}"
                   class="btn btn-alt-primary d-inline-block">
                    <i class="fa fa-plus"></i>
                    Add {{ str(request()->segment(1))->ucfirst()->singular() }}
                </a>
            </div>
            <div class="block-content block-content-full">

                @yield('table')

                {{ ${request()->segment(1)}->links() }}

            </div>
        </div>
    </div>

@endsection
