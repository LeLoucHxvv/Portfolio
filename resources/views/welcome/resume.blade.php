<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Resume :: Resume</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-welcome/vendors/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-welcome/css/live-resume.css') }}">
</head>

<body>
    <header>
        <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto"><img
                src="{{ asset('assets-welcome/images/share.svg') }}" alt="share" class="btn-img">
            SHARE</button>
        <nav class="collapsible-nav" id="collapsible-nav">
            <a href="{{ route('welcome') }}" class="nav-link">HOME</a>
            <a href="{{ route('welcome.resume') }}" class="nav-link active">RESUME</a>
            <a href="{{ route('welcome.portfolio') }}" class="nav-link">PORTFOLIO</a>
            <a href="{{ route('welcome.blog') }}" class="nav-link">BLOG</a>
            <a href="{{ route('contact.index') }}" class="nav-link">CONTACT</a>
        </nav>
        <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{ asset('assets-welcome/images/hamburger.svg') }}"
                alt="hamburger"></button>
    </header>
    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                <img src="{{ asset('assets-welcome/images/Profile.png') }}" alt="profile">
            </div>
            <h1 class="profile-name">{{ $about->name }}</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">UI / UX Designer</span>
            </div>
            <nav class="social-links">
                <a href="#!" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-behance"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-dribbble"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-github"></i></a>
            </nav>
            <div class="widget">
                <h5 class="widget-title">personal information</h5>
                <div class="widget-content">
                    <p>BIRTHDAY : {{ $about->bday }}</p>
                    <p>WEBSITE : {{ $about->website }}</p>
                    <p>PHONE : {{ $about->mobile_number }}</p>
                    <p>MAIL : {{ $about->email }} </p>
                    <p>Location : {{ $about->location }} </p>
                    <button class="btn btn-download-cv btn-primary rounded-pill"> <img
                            src="{{ asset('assets-welcome/images/download.svg') }}" alt="download"
                            class="btn-img">DOWNLOAD CV </button>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">LANGUAGES</h5>
                        @foreach ($language as $key => $languages)
                            <p>{{ $languages->language }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">INTERESTS</h5>
                        @foreach ($interest as $key => $interests)
                            <p>{{ $interests->interest }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>
        <main>
            <section class="resume-section">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">EDUCATION</h2>
                        <ul class="time-line">
                            @foreach ($education as $key => $educations)
                                <li class="time-line-item">
                                    <span class="badge badge-primary">{{ $educations->school_year }}</span>
                                    <h6 class="time-line-item-title">{{ $educations->master }}</h6>
                                    <p class="time-line-item-subtitle">MASTER, UNIVERSITY</p>
                                    <p class="time-line-item-content">{{ $educations->summary }}</p>
                                </li>
                            @endforeach
                            {{-- <li class="time-line-item">
                                <span class="badge badge-primary">1995 - 1998</span>
                                <h6 class="time-line-item-title">Studied at Harvard University</h6>
                                <p class="time-line-item-subtitle">UNIVERSITY</p>
                                <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                                    vitae, interdum sed tortor.
                                </p>
                            </li> --}}

                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="section-subtitle">RESUME</h6>
                        <h2 class="section-title">Experience</h2>
                        <ul class="time-line">
                            @foreach ($experience as $key => $experiences)
                                <li class="time-line-item">
                                    <span class="badge badge-primary">{{ $experiences->year_experience }}</span>
                                    <h6 class="time-line-item-title">{{ $experiences->job }}</h6>
                                    <p class="time-line-item-subtitle">Web Agency</p>
                                    <p class="time-line-item-content">{{ $experiences->summary }}</p>
                                </li>
                            @endforeach
                            {{-- <li class="time-line-item">
                                <span class="badge badge-primary">2008 - 2010</span>
                                <h6 class="time-line-item-title">Web Designer</h6>
                                <p class="time-line-item-subtitle">Apple Inc.</p>
                                <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                                    vitae, interdum sed
                                    tortor.
                                </p>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </section>
            <section class="clients-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">CLIENTS</h2>
                <div class="client-logos-wrapper">
                    <div class="client-logo"><img src="{{ asset('assets-welcome/images/Clients_1.svg') }}"
                            alt="logo" class="w-100"></div>
                    <div class="client-logo"><img src="{{ asset('assets-welcome/images/Clients_2.svg') }}"
                            alt="logo" class="w-100"></div>
                    <div class="client-logo"><img src="{{ asset('assets-welcome/images/Clients_3.svg') }}"
                            alt="logo" class="w-100"></div>
                    <div class="client-logo"><img src="{{ asset('assets-welcome/images/Clients_4.svg') }}"
                            alt="logo" class="w-100"></div>
                </div>
            </section>
            <section class="services-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">SERVICES</h2>
                <div class="row">
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="{{ asset('assets-welcome/images/001-target.svg') }}" alt="target">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">web designing</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.</p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="{{ asset('assets-welcome/images/003-idea.svg') }}" alt="bulb">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Graphic design</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="{{ asset('assets-welcome/images/002-development.svg') }}" alt="development">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Development</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                    <div class="media service-card col-lg-6">
                        <div class="service-icon">
                            <img src="{{ asset('assets-welcome/images/004-smartphone.svg') }}" alt="smartphone">
                        </div>
                        <div class="media-body">
                            <h5 class="service-title">Mobile design</h5>
                            <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed
                                tortor.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="achievements-section">
                <h6 class="section-subtitle">WHAT I DO</h6>
                <h2 class="section-title">ACHIEVEMENTS</h2>
                <div class="achievement-cards-wrapper">
                    <div class="media achievement-card">
                        <img src="{{ asset('assets-welcome/images/puzzle.svg') }}" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">550+</h4>
                            <p class="achievement-card-description">COMPLETED PROJECTS</p>
                        </div>
                    </div>
                    <div class="media achievement-card">
                        <img src="{{ asset('assets-welcome/images/team.svg') }}" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">23K</h4>
                            <p class="achievement-card-description">HAPPY CLIENTS</p>
                        </div>
                    </div>
                    <div class="media achievement-card">
                        <img src="{{ asset('assets-welcome/images/trophy.svg') }}" alt="puzzle"
                            class="achievement-card-icon">
                        <div class="media-body">
                            <h4 class="achievement-card-title">55</h4>
                            <p class="achievement-card-description">AWARDS RECIEVED</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="testimonial-section">
                <div id="testimonialCarousel" class="testimonial-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="{{ asset('assets-welcome/images/Profile.png') }}" alt="profile"
                                class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="{{ asset('assets-welcome/images/Profile.png') }}" alt="profile"
                                class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="assets/images/Profile.png" alt="profile" class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </section>

            <footer>Live Resume @ <a href="https://www.bootstrapdash.com" target="_blank"
                    rel="noopener noreferrer">BootstrapDash</a>. All Rights Reserved 2020</footer>
        </main>
    </div>
    <script src="{{ asset('assets-welcome/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-welcome/vendors/@popperjs/core/dist/umd/popper-base.min.js') }}"></script>
    <script src="{{ asset('assets-welcome/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-welcome/js/live-resume.js') }}"></script>
</body>

</html>
