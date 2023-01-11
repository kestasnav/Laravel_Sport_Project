<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nba Project Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="adminas/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="adminas/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="adminas/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="adminas/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="adminas/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="adminas/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="adminas/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="adminas/assets/images/favicon.png" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />--}}
    <script src="https://kit.fontawesome.com/dcbeebf121.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @vite([ 'resources/js/app.js'])
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{route('admin')}}">Admin Dashboard</a>
            <a class="sidebar-brand brand-logo-mini" href="{{route('admin')}}">A</a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="adminas/assets/images/faces/face15.jpg" alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}} </h5>
                            <span>{{Auth::user()->type}}</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                        <a href="{{ route('profileEdit', Auth::user()->id) }}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">{{ __('Profilio redagavimas') }}</p>
                            </div>
                        </a>
                </div>
            </li>

            <li class="nav-item nav-category">
                <span class="nav-link">{{ __('Meniu') }}</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.posts') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">{{__('Visos naujienos')}}</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">{{__('Produktai')}}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('products') }}">{{__('Visi produktai')}}</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('productcategories.index') }}">{{__('Produktų kategorijos')}}</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.comments') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">{{__('Komentarai')}}</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('orders.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
                    <span class="menu-title">{{__('Užsakymai')}}</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.users') }}">
              <span class="menu-icon">
                 <i class="mdi mdi-security"></i>
              </span>
                    <span class="menu-title">{{__('Vartotojai')}}</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="{{route('admin')}}">
                    <img src="{{ asset('storage/images/'.'logo2.png')}}" style=" width: 80px; height: 50px;" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="{{ route('posts.create') }}">
                            <i class="fa-solid fa-marker"></i> {{__('Pridėti naujieną')}}</a>
                    </li>

                    <li class="nav-item dropdown border-left">
                        <a class="nav-link" href="{{ route('setLanguage', 'lt') }}">LT</a>
                    </li>

                    <li class="nav-item dropdown border-left">
                        <a class="nav-link" href="{{ route('setLanguage', 'en') }}">EN</a>
                    </li>

{{--                    <li class="nav-item dropdown border-left">--}}
{{--                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">--}}
{{--                            <i class="mdi mdi-email"></i>--}}
{{--                            <span class="count bg-success"></span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">--}}
{{--                            <h6 class="p-3 mb-0">Messages</h6>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item preview-item">--}}
{{--                                <div class="preview-thumbnail">--}}
{{--                                    <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">--}}
{{--                                </div>--}}
{{--                                <div class="preview-item-content">--}}
{{--                                    <p class="preview-subject ellipsis mb-1">Mark send you a message</p>--}}
{{--                                    <p class="text-muted mb-0"> 1 Minutes ago </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <p class="p-3 mb-0 text-center">4 new messages</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown border-left">--}}
{{--                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">--}}
{{--                            <i class="mdi mdi-bell"></i>--}}
{{--                            <span class="count bg-danger"></span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">--}}
{{--                            <h6 class="p-3 mb-0">Notifications</h6>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item preview-item">--}}
{{--                                <div class="preview-thumbnail">--}}
{{--                                    <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                        <i class="mdi mdi-calendar text-success"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="preview-item-content">--}}
{{--                                    <p class="preview-subject mb-1">Event today</p>--}}
{{--                                    <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item preview-item">--}}
{{--                                <div class="preview-thumbnail">--}}
{{--                                    <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                        <i class="mdi mdi-settings text-danger"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="preview-item-content">--}}
{{--                                    <p class="preview-subject mb-1">Settings</p>--}}
{{--                                    <p class="text-muted ellipsis mb-0"> Update dashboard </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item preview-item">--}}
{{--                                <div class="preview-thumbnail">--}}
{{--                                    <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                        <i class="mdi mdi-link-variant text-warning"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="preview-item-content">--}}
{{--                                    <p class="preview-subject mb-1">Launch Admin</p>--}}
{{--                                    <p class="text-muted ellipsis mb-0"> New admin wow! </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <p class="p-3 mb-0 text-center">See all notifications</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="adminas/assets/images/faces/face15.jpg" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}} {{Auth::user()->surname}}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">{{__('Profilis')}}</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{ route('profileEdit', Auth::user()->id) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">

                                    {{ __('Profilio redagavimas') }}

                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item"  href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">{{ __('Atsijungti') }}</p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Sport Project</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="adminas/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="adminas/assets/vendors/chart.js/Chart.min.js"></script>
<script src="adminas/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="adminas/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="adminas/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="adminas/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="adminas/assets/js/off-canvas.js"></script>
<script src="adminas/assets/js/hoverable-collapse.js"></script>
<script src="adminas/assets/js/misc.js"></script>
<script src="adminas/assets/js/settings.js"></script>
<script src="adminas/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="adminas/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
