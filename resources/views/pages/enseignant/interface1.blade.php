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
    <title>Gecap-Enseignant-2024</title>

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
                <a href="" class="logo">
                    <img src="{{ URL::to('admin-template/assets/img/logog.png') }}" width="80px" height="80px"
                        alt="">
                </a>
                <a href="" class="logo-small">
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



                </li>


               

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img
                                src="{{ URL::to('admin-template/assets/img/profiles/avator1.jpg') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    <img src="{{ URL::to('admin-template/assets/img/profiles/avator1.jpg') }}" alt="" id="profilePic">
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    @if (Auth::guard('enseignant')->check())
                                    <h6>{{ Auth::guard('enseignant')->user()->prenom }} {{ Auth::guard('enseignant')->user()->nom }}</h6>
                                    <h5>{{ Auth::guard('enseignant')->user()->type->name }}</h5>
                                @endif
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item"  href="{{ route('pages.enseignant.profile.vue') }}"> <i class="me-2" data-feather="user"></i>
                                Mon Profile</a>
                           
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
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
                    <a class="dropdown-item" href="{{ route('pages.enseignant.profile.vue') }}">Mon Profile</a>

                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
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
                        <li class="active">
                            <a href="{{route('enseignant.home')}}"><img src="{{ URL::to('admin-template/assets/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ URL::to('admin-template/assets/img/icons/purchase1.svg') }}" alt="img"><span>
                                    Pedagogie</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('pages.enseignant.emplois.listes')}}">Emplois</a></li>
          
            
                            </ul>
                        </li>
                       

                           
             
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">



            <footer id="footer" class="enseignant">

                <div class="footer-content position-relative">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="footer-info " style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                    <h4 class="">Bienvenue, <br>{{ Auth::guard('enseignant')->user()->prenom }} {{ Auth::guard('enseignant')->user()->nom }}</h4>
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

                    @php
                    use App\Models\Emplois;
                    use App\Models\Enseignant;
                    use App\Models\eleve;
                    use App\Models\Programme;
                    @endphp
                    
                    
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count bg-secondary">
                            <div class="dash-counts">
                                <h4>{{ Emplois::count() }}</h4>
                                <h5>Emplois</h5>
                            </div>
                            <div class="dash-imgs">
                                <a href="{{route('personnels.listes')}}">
                                 <i data-feather="user"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>{{ Enseignant::count() }}</h4>
                                <h5>Enseignants</h5>
                            </div>
                            <div class="dash-imgs">
                                <a href="{{route('enseignants.listes')}}"><i data-feather="user-check"> </i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>{{ eleve::count() }}</h4>
                                <h5>Eleves</h5>
                            </div>
                            <div class="dash-imgs">
                                <a href="{{route('eleves.listes')}}"> <i data-feather="file-text"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>{{ Programme::count() }}</h4>
                                <h5>Programmes</h5>
                            </div>
                            <div class="dash-imgs">
                                <a href="{{route('programmes.listes')}}"><i data-feather="file"></i></a>
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
