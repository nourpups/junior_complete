@extends('layouts.backend')

@section('title', str($entity)->ucfirst().' Table') {{-- $entity is the plural name of the model (projects, tasks) --}}

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-between">
                <h3 class="block-title">
                    {{ str($entity)->ucfirst() }} Table
                </h3>
                @can('create_'. str($entity)->singular()) {{-- e.g create_project, create_task --}}
                    <a href="{{ route($entity.'.create') }}" {{-- e.g projects.create, tasks.create --}}
                       class="btn btn-alt-primary d-inline-block">
                        <i class="fa fa-plus"></i>
                        Create {{ str($entity)->ucfirst()->singular() }}
                    </a>
                @endcan
            </div>
            <div class="block-content block-content-full">

                @yield('table')

                {{ ${str($entity)}->links() }}

            </div>
        </div>
    </div>

@endsection
