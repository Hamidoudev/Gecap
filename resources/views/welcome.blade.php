<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Page-Accueil-Gecap-2024</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ URL::to('admin-template/assets/img/gecap.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::to('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('template/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::to('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::to('template/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only"></span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
                <a href="#" class="navbar-brand p-0">
                    <h1 class="m-0">GECAP</h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#accueil" class="nav-item nav-link active">Accueil</a>
                        <a href="#apropos" class="nav-item nav-link">A-propos</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ajoutEnseignantModal"
                            class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block "
                            data-bs-toggle="dropdown">Se Connecter</a>
                        <div class="dropdown-menu m-0">
                            <a href="auth/ecole/login" class="dropdown-item">Ecole</a>
                            <a href="auth/enseignant/login" class="dropdown-item">Enseignant</a>
                        </div>
                    </div>
                </div>

            </nav>

            <div class="container-xxl bg-primary hero-header" id="accueil">
                <div class="container px-lg-1 ">
                    <div class="row g-5 align-items-center ">
                        <div class="col-lg-6 text-center text-lg-start mt-0"
                            style="font-family: 'Times New Roman', Times, serif">
                            <h1 class="text-white mb-4 animated slideInDown">Bienvenue sur GeCAP</h1>
                            <p class="text-white pb-3 animated slideInDown">L'outil indispensable pour le Centre
                                d'Animation Pédagogique de Sebenicoro !
                                Nous sommes ravis de vous accueillir sur notre plateforme conçue sur mesure pour
                                simplifier et optimiser vos processus.
                                Facilitez votre gestion administrative,
                                optimisez vos programmes pédagogiques et donnez une nouvelle dimension à votre
                                efficacité organisationnelle</p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200"
                            onmousedown="startTimer()" onmouseup="stopTimer()" ontouchstart="startTimer()"
                            ontouchend="stopTimer()">
                            <img src="{{ URL::to('Arsha/assets/img/login.png') }}" class="img-fluid animated"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Feature Start -->
        {{-- <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <img src="C:\laragon\www\gestioncap\public\template\img\html.png" alt="Digital Marketing Image" class="mb-4" style="max-width: 100%; height: auto;">
                            <h5 class="mb-3">Digital Marketing</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa fa-3x fa-search text-primary mb-4"></i>
                            <h5 class="mb-3">SEO & Backlinks</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa fa-3x fa-laptop-code text-primary mb-4"></i>
                            <h5 class="mb-3">Design & Development</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Feature End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Quelques membres de
                        l'administration<span></span></p>
                    <h1 class="text-center mb-5">Quelques membres</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/bakary3.png') }}" alt="Social Media Marketing"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Directeur Géneral</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/lex2.png') }}" alt="Email Marketing"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Directeur Géneral Adjoint</h5>
                            <p class="m-0"></p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/fouss2.png') }}" alt="PPC Advertising"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Sécretaire Général</h5>
                            <p class="m-0"></p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/eve2.png') }}" alt="App Development"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Comptable</h5>
                            <p class="m-0"></p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/hamidou.png') }}" alt="App Development"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Assistant Comptable</h5>
                            <p class="m-0"></p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img src="{{ URL::to('Arsha/assets/img/mira2.png') }}" alt="App Development"
                                    class="img-fluid">
                            </div>
                            <h5 class="mb-3">Sécretaire d'administration</h5>
                            <p class="m-0"></p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts Start -->
        <div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">3</h1>
                        <p class="text-white mb-0">Ecoles</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                        <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">34</h1>
                        <p class="text-white mb-0">Membres de l'administration</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">8</h1>
                        <p class="text-white mb-0">Elèves</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                        <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">34</h1>
                        <p class="text-white mb-0">Enseignants</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->

        <!-- Service End -->




        <!-- Projects Start
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Our Projects<span></span></p>
                    <h1 class="text-center mb-5">Recently Completed Projects</h1>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="mx-2 active" data-filter="*">All</li>
                            <li class="mx-2" data-filter=".first">Web Design</li>
                            <li class="mx-2" data-filter=".second">Graphic Design</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-2.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-3.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-4.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-5.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="img/portfolio-6.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">UI / UX Design</p>
                                <h5 class="lh-base mb-0">Digital Agency Website Design And Development</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Projects End -->


        <!-- Testimonial Start
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
                <h1 class="text-center mb-5">What Say Our Clients!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Testimonial End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5" id="apropos">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>A prpos de
                        nous<span></span></p>
                    <h1 class="text-center mb-5">A PROPOS DE NOUS</h1>
                </div>
                <div class="row g-4">
                    <p>Le CAP de Sébénikoro, situé au secteur 7 du quartier de Sébénikoro. Il administre les écoles des quartiers de Sébénikoro, Djicoroni-Para, Kalabambougou et Sibiribougou.
                        Le CAP de Sébénikoro est une structure éducative qui offre différents services de soutien aux enseignants et aux écoles. 
                        </p>

                </div>
            </div>
        </div>
   
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3">
                    <p class="section-title text-white h5 mb-4">Adresse<span></span></p>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Sébénikoro</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+223 00 00 00 00</p>
                    <p><i class="fa fa-envelope me-3"></i>gecap@email.com</p>
                    {{-- <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div> --}}
                </div>
                <div class="col-md-6 col-lg-3">
                    <p class="section-title text-white h5 mb-4">Lien rapide<span></span></p>
                    <a class="btn btn-link" href="#accueil">Accueil</a>
                    <a class="btn btn-link" href="#apropos">A propos de nous</a>
                    <a class="btn btn-link" href="" data-bs-toggle="modal"
                        data-bs-target="#ajoutEnseignantModal">Contact</a>
                </div>
            </div>
        </div>
        <div class="container px-lg-5">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">GéCAP</a>, &copy; 2024 GéCAP.Tous droits
                        réservés.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Conçu par <a class="border-bottom" href="">DevEve&DevHamidou</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @include('contact')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('template/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::to('template/js/main.js') }}"></script>

    <script>
        // Fonction pour détecter l'appui long
        var timer;

        function startTimer() {
            timer = setTimeout(function() {
                // Rediriger vers la page de connexion administrateur
                window.location.href = "{{ url('auth/login') }}";
            }, 5000); // 7 secondes
        }

        function stopTimer() {
            clearTimeout(timer);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Remove 'active' class from all nav links
                    navLinks.forEach(nav => nav.classList.remove('active'));

                    // Add 'active' class to the clicked nav link
                    this.classList.add('active');
                });
            });

            // To handle modal links specifically if needed
            const modalLink = document.querySelector('a[data-bs-target="#ajoutEnseignantModal"]');
            if (modalLink) {
                modalLink.addEventListener('click', function() {
                    // Remove 'active' class from all nav links
                    navLinks.forEach(nav => nav.classList.remove('active'));

                    // Add 'active' class to the clicked modal link
                    this.classList.add('active');
                });
            }
        });
    </script>
</body>

</html>
