@extends('layouts.backend')

@section('js')

  <script src="{{asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <script>Codebase.helpersOnLoad(['jq-easy-pie-chart']);</script>

@endsection

@section('content')
  <!-- Page Content -->
  <div class="content">
    <div class="row items-push">
      <div class="col-md-6 col-xl-3">
        <div class="block block-rounded">
          <div class="block-content block-content-full bg-warning">
            <div class="js-pie-chart pie-chart" data-percent="30" data-line-width="4" data-size="120" data-bar-color="#ffffff" data-track-color="rgba(255,255,255,.25)" data-scale-color="rgba(255,255,255,.5)">
              <span class="text-white">6 Slots</span>
            </div>
          </div>
          <div class="block-content block-content-full text-center">
            <a class="btn rounded-pill btn-alt-warning" href="javascript:void(0)">
              <i class="fa fa-plus opacity-50 me-1"></i> Add new
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">
              Block Title
            </h3>
          </div>
          <div class="block-content font-size-sm text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Page Content -->
@endsection
