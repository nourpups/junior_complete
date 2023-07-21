@extends('layouts.backend')

@section('title', str($entity)->ucfirst().' Table')

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-between">
                <h3 class="block-title">
                    {{ str($entity)->ucfirst() }} Table
                </h3>
                <a href="{{ route($entity.'.create') }}"
                   class="btn btn-alt-primary d-inline-block">
                    <i class="fa fa-plus"></i>
                    Create {{ str($entity)->ucfirst()->singular() }}
                </a>
            </div>
            <div class="block-content block-content-full">

                @yield('table')

                {{ ${str($entity)}->links() }}

            </div>
        </div>
    </div>

@endsection
