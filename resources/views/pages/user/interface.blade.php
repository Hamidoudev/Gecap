<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Ecole-Gecap-2024</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('admin-template/assets/img/gecap.png') }}">

    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('admin-template/assets/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="{{ URL::to('admin-template/assets/img/logog.png') }}" width="80px" height="80px"
                        alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{ URL::to('admin-template/assets/img/logopetit.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{ URL::to('admin-template/assets/img/icons/closes.svg') }}"
                                            alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img
                                    src="{{ URL::to('admin-template/assets/img/icons/search.svg') }}"
                                    alt="img"></a>
                        </form>
                    </div>
                </li>


                {{-- <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
                        role="button">
                        <img src="{{ URL::to('admin-template/assets/img/flags/us1.png') }}" alt=""
                            height="20">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ URL::to('admin-template/assets/img/flags/us.png') }}" alt=""
                                height="16"> English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ URL::to('admin-template/assets/img/flags/fr.png') }}" alt=""
                                height="16"> French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ URL::to('admin-template/assets/img/flags/es.png') }}" alt=""
                                height="16"> Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ URL::to('admin-template/assets/img/flags/de.png') }}" alt=""
                                height="16"> German
                        </a>
                    </div>
                </li> --}}


               

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img
                                src="{{ URL::to('admin-template/assets/img/profiles/avator1.jpg') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img
                                        src="{{ URL::to('admin-template/assets/img/profiles/avator1.jpg') }}"
                                        alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    @if (Auth::check() && Auth::user()->type)
                                        <h6>{{ Auth::user()->username }} </h6>
                                        <h5>{{ Auth::user()->type->name }}</h5>
                                    @endif

                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal"
                                href="{{ url('profile/edit') }}"> <i class="me-2" data-feather="user"></i>
                                Mon Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        @php
                            $types = \App\Models\Droit::all()->groupBy('type_droit_id');
                        @endphp


                        <li class="active">
                            <a href="{{ url('/user/home') }}"><img
                                    src="{{ URL::to('admin-template/assets/img/icons/dashboard.svg') }}"
                                    alt="img"><span> Dashboard</span> </a>
                        </li>
                        @foreach ($types as $key => $type)
                            @php
                                $elements = 0;
                                $droitAutorises =[] ;
                                foreach ($type as $id => $droit) {
                                    $droitAutorises = DB::table('droit_role')
                                                                ->where('role_id', '=',Auth::user()->role->id)
                                                                ->where('droit_id', '=',$droit->id)
                                                                ->get("id");
                                    if (count($droitAutorises)) {
                                        $elements += 1;
                                    }                              
                                }

                            @endphp
                            @if($elements > 0)                 
                                <li class="submenu">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::to('admin-template/assets/img/icons/product.svg') }}"
                                            alt="img"><span>{{\App\Models\TypeDroit::find($key)->nom}}</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        @forelse ($type as $droit)
                                            @php
                                                $droitAutorises = DB::table('droit_role')
                                                                    ->where('role_id', '=',Auth::user()->role->id)
                                                                    ->where('droit_id', '=',$droit->id)
                                                                    ->get("id");

                                            @endphp 
                                            @if(count($droitAutorises))                                      
                                                <li><a href="{{ route($droit->route) }}">{{$droit->nom}}</a></li>
                                            @endif
                                        @empty
                                            
                                        @endforelse
                                    

                                    </ul>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <footer id="footer" class="ecole">

                <div class="footer-content position-relative">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="footer-info ">
                                    <h4 class="">Bienvenue, <br> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                                    <p>
                                        sur votre espace de travail.
                                    </p>
                                </div>
                                    <div class="social-links d-flex mt-3">

                                    </div>
                               
                            </div><!-- End footer info column-->

                            <div class="col-lg-2 col-md-3 footer-links">
                               
                                    <h4></h4>
                                    <ul>
                                      <li><a href="#"></a></li>
                                      <li><a href="#"></a></li>
                                      <li><a href="#"></a></li>
                                      <li><a href="#"></a></li>
                                      <li><a href="#"></a></li>
                                    </ul>
                                  

                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">

                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">

                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">

                            </div><!-- End footer links column-->

                        </div>
                    </div>
                </div>
               

            </footer>
            <div class="content">



                <div class="row">

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>0</h4>
                                <h5>Enseignants</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>0</h4>
                                <h5>Elèves</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>0</h4>
                                <h5>Programmes</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>0</h4>
                                <h5>Emplois du Temps</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-legal text-center position-relative">
                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong><span>GestionCAP</span></strong>. Gestion Administrative
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                        Designed by <a href="">Hamidou & Eve</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ URL::to('admin-template/assets/js/jquery-3.6.0.min.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/js/feather.min.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/js/jquery.slimscroll.min.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ URL::to('admin-template/assets/js/dataTables.bootstrap4.min.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/js/bootstrap.bundle.min.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/plugins/apexchart/apexcharts.min.js') }} "></script>
    <script src="{{ URL::to('admin-template/assets/plugins/apexchart/chart-data.js') }} "></script>

    <script src="{{ URL::to('admin-template/assets/js/script.js') }} "></script>
</body>

</html>
