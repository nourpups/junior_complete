<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">

   <title>@yield('title')</title>

   <meta name="description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
   <meta name="author" content="pixelcave">
   <meta name="robots" content="noindex, nofollow">

   <!-- Open Graph Meta -->
   <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
   <meta property="og:site_name" content="Codebase">
   <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
   <meta property="og:type" content="website">
   <meta property="og:url" content="">
   <meta property="og:image" content="">

   <!-- Icons -->
   <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
   <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
   <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

   <!-- Modules -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">
   @yield('css')
   {{-- @vite(['resources/sass/main.scss']) --}}

   <script src="{{asset('js/lib/jquery.min.js')}}"></script>
</head>

<body>
<!-- Page Container -->
<!--
  Available classes for #page-container:

  SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

  HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

  HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-dark'                          Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-dark'        Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

  MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

  DARK MODE

    'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
-->
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">


   <!-- Sidebar -->
   <!--
     Helper classes

     Adding .smini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
     Adding .smini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
       If you would like to disable the transition, just add the .no-transition along with one of the previous 2 classes

     Adding .smini-hidden to an element will hide it when the sidebar is in mini mode
     Adding .smini-visible to an element will show it only when the sidebar is in mini mode
     Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
   -->
   <nav id="sidebar">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
         <!-- Side Header -->
         <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
            <span class="smini-visible fw-bold tracking-wide fs-lg">
              c<span class="text-primary">b</span>
            </span>
               <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
              <span class="smini-hidden">
                <i class="fa fa-fire text-primary"></i>
                <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
              </span>
               </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
               <!-- Close Sidebar, Visible only on mobile screens -->
               <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
               <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
                  <i class="fa fa-fw fa-times"></i>
               </button>
               <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
         </div>
         <!-- END Side Header -->

         <!-- Sidebar Scrolling -->
         <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
               <!-- Visible only in mini mode -->
               <div class="smini-visible-block animated fadeIn px-3">
                  <img class="img-avatar img-avatar32" src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" alt="">
               </div>
               <!-- END Visible only in mini mode -->

               <!-- Visible only in normal mode -->
               <div class="smini-hidden text-center mx-auto">
                  <a class="img-link" href="javascript:void(0)">
                     <img class="img-avatar" src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" alt="">
                  </a>
                  <ul class="list-inline mt-3 mb-0">
                     <li class="list-inline-item">
                        <a class="link-fx text-dual fs-sm fw-semibold text-uppercase" href="javascript:void(0)">{{auth()->user()->name}}</a>
                     </li>
                      <li class="list-inline-item">
                        <a class="link-fx text-dual" onclick="document.getElementById('logout-form').submit()">
                           <i class="fa fa-sign-out-alt"></i>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
               <ul class="nav-main">
                  <li class="nav-main-item">
                     <a class="nav-main-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{route('dashboard')}}">
                        <i class="nav-main-link-icon fa fa-house-user"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                     </a>
                  </li>
                  @can('access_client')
                     <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->routeIs('clients.*') ? ' active' : '' }}" href="{{route('clients.index')}}">
                           <i class="nav-main-link-icon fa fa-user-tag"></i>
                           <span class="nav-main-link-name">Clients</span>
                        </a>
                     </li>
                  @endcan
                  @can('access_users')
                     <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->routeIs('users.*') ? ' active' : '' }}" href="{{route('users.index')}}">
                           <i class="nav-main-link-icon fa fa-users"></i>
                           <span class="nav-main-link-name">Users</span>
                        </a>
                     </li>
                  @endcan
                  <li class="nav-main-item">
                     <a class="nav-main-link{{ request()->routeIs('projects.*') ? ' active' : '' }}" href="{{route('projects.index')}}">
                        <i class="nav-main-link-icon fa-solid fa-diagram-project"></i>
                        <span class="nav-main-link-name">Projects</span>
                     </a>
                  </li>
                  <li class="nav-main-item">
                     <a class="nav-main-link{{ request()->routeIs('tasks.*') ? ' active' : '' }}" href="{{route('tasks.index')}}">
                        <i class="nav-main-link-icon fa fa-tasks"></i>
                        <span class="nav-main-link-name">Tasks</span>
                     </a>
                  </li>
                  @can('access_roles')
                     <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->routeIs('roles.*') ? ' active' : '' }}" href="{{route('roles.index')}}">
                           <i class="nav-main-link-icon fa fa-users-gear"></i>
                           <span class="nav-main-link-name">Roles</span>
                        </a>
                     </li>
                  @endcan
                  @can('access_permission')
                     <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->routeIs('permissions.*') ? ' active' : '' }}" href="{{route('permissions.index')}}">
                           <i class="nav-main-link-icon fas fa-unlock-alt"></i>
                           <span class="nav-main-link-name">Permissions</span>
                        </a>
                     </li>
                  @endcan
                     <li class="nav-main-item ribbon ribbon-primary">
                        @if($unreadNotificationsCount)
                           <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger" style="left: 95%">
                            {{$unreadNotificationsCount}}
                          </span>
                        @endif
                        <a class="nav-main-link{{ request()->routeIs('notifications.*') ? ' active' : '' }}" href="{{route('notifications.index')}}">
                           <i class="nav-main-link-icon fas fa-bell"></i>
                           <span class="nav-main-link-name">Notifications</span>
                        </a>
                     </li>
               </ul>
            </div>
            <!-- END Side Navigation -->
         </div>
         <!-- END Sidebar Scrolling -->
      </div>
      <!-- Sidebar Content -->
   </nav>
   <!-- END Sidebar -->

   <!-- Header -->
   <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
         <!-- Left Section -->
         <div class="space-x-1">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
               <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button class="btn btn-sm btn-alt-secondary text-dual" data-toggle="layout" data-action="dark_mode_toggle">
               <i class="fa fa-burn"></i>
            </button>
         </div>
         <!-- END Left Section -->

         <!-- Right Section -->
         <div class="space-x-1">
            <!-- User Dropdown -->
            @auth
               <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user d-sm-none"></i>
                     <span class="d-none d-sm-inline-block fw-semibold">{{auth()->user()->name}}</span>
                     <i class="fa fa-angle-down opacity-50 ms-1"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                     <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                           {{auth()->user()->name}}
                        </h5>
                     </div>
                     <div class="p-2">
                        <a href="{{route('profiles.edit', auth()->user())}}" class="dropdown-item d-flex align-items-center justify-content-between space-x-1" style="cursor: pointer">
                           <span>Edit Profile</span>
                           <i class="fa fa-fw fa-pencil-alt opacity-25"></i>
                        </a>
                     </div>
                     <div class="p-2">
                        <form id="logout-form" action="{{route('logout')}}" method="POST">@csrf</form>
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" style="cursor: pointer" onclick="document.getElementById('logout-form').submit()">
                           <span>Sign Out</span>
                           <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                        </a>
                     </div>
                  </div>
               </div>
         @endauth

         </div>
         <!-- END Right Section -->

      </div>

      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
         <div class="content-header">
            <form class="w-100" action="/dashboard" method="POST">
               @csrf
               <div class="input-group">
                  <!-- Close Search Section -->
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                     <i class="fa fa-fw fa-times"></i>
                  </button>
                  <!-- END Close Search Section -->
                  <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                  <button type="submit" class="btn btn-secondary">
                     <i class="fa fa-fw fa-search"></i>
                  </button>
               </div>
            </form>
         </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <div id="page-header-loader" class="overlay-header bg-primary">
         <div class="content-header">
            <div class="w-100 text-center">
               <i class="far fa-sun fa-spin text-white"></i>
            </div>
         </div>
      </div>
      <!-- END Header Loader -->

   </header>
   <!-- END Header -->
   <!-- Main Container -->
   <main id="main-container">
      @include('partials.flash')
      @yield('content')
   </main>
   <!-- END Main Container -->

   <!-- Footer -->
   <footer id="page-footer">
      <div class="content py-3">
         <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
               Crafted
               with
               <i class="fa fa-heart text-danger"></i>
               by
               <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
               <a class="fw-semibold" href="https://1.envato.market/95j" target="_blank">Codebase</a> &copy;
               <span data-toggle="year-copy"></span>
            </div>
         </div>
      </div>
   </footer>
   <!-- END Footer -->
</div>
<!-- END Page Container -->
<script src="{{asset('js/codebase.app.min.js')}}"></script>

<script>
   $(document).ready(function () {
      $('.alert').fadeIn().delay(5000).fadeOut();
   });
</script>

<script>

</script>

@yield('js')

</body>

</html>
