<?php
include 'views/heading.php';
?>
<body>
       <header class="position-absolute w-100">
        <div class="container">
            <div class="top-header d-none d-sm-flex justify-content-between align-items-center">
                <div class="contact">
                    <a href="tel:+254726585990" class="tel"><i class="fa fa-phone" aria-hidden="true"></i>+25471234567</a>
                    <a href="mailto:info@kilimani.com"><i class="fa fa-envelope"
                            aria-hidden="true"></i>info@kilimani.com</a>
                </div>
                <nav class="d-flex aic">
                    <a href="login" class="login"><i class="fa fa-user" aria-hidden="true"></i>Login</a>
                    <ul class="nav social d-none d-md-flex">
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </nav>
            </div>
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="home"><i class="fa fa-university">kilimani Sacco</i></a>
                <div class="group d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <a class="login-icon d-sm-none" href="login"><i class="fa fa-user"></i></a>
                </div>
                <a class="search-icon d-none d-md-block" href="#"><i class="fa fa-search"></i></a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="contact">Contact Us</a></li> -->
                    </ul>
                    <form class="bg-white search-form" method="get" id="searchform">
                        <div class="input-group">
                            <input class="field form-control" id="s" name="s" type="text" placeholder="Search">
                            <span class="input-group-btn">
                                <input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
                                    value="Search">
                            </span>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-md-1 col-md-11">
                    <div class="swiper-container hero-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slide-content d-flex align-items-center">
                                <div class="single-slide">
                                    <h1 data-aos="fade-right" data-aos-delay="200">kilimani Sacco<br> We got your Back
                                    </h1>
                                    <p data-aos="fade-right" data-aos-delay="600">Redefining financial wellness
                                        and <br>offering financial assistance whenever needed
                                    </p>
                                    <a data-aos="fade-right" data-aos-delay="900" href="about" class="btn btn-primary">See
                                        More</a>
                                    <a data-aos="fade-right" data-aos-delay="900" href="#" class="btn btn-primary">Get
                                        Now</a>
                                </div>
                            </div>
                            <div class="swiper-slide slide-content d-flex align-items-center">
                                <div class="single-slide">
                                    <h1 data-aos="fade-right" data-aos-delay="200">kilimani Sacco<br> We got your Back
                                    </h1>
                                    <p data-aos="fade-right" data-aos-delay="600">Redefining financial wellness
                                        and <br>offering financial assistance whenever needed
                                    </p>
                                    <a data-aos="fade-right" data-aos-delay="900" href="#" class="btn btn-primary">See
                                        More</a>
                                    <a data-aos="fade-right" data-aos-delay="900" href="#" class="btn btn-primary">Get
                                        Now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Add Control -->
            <span class="arr-left"><i class="fa fa-angle-left"></i></span>
            <span class="arr-right"><i class="fa fa-angle-right"></i></span>
        </div>
        <div class="texture"></div>
        <div class="diag-bg"></div>
    </section>
    <!-- Hero End -->
    <!-- Call To Action Start -->
    <section class="cta" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-left">
                <div class="content" data-aos="fade-right" data-aos-delay="200">
                    <h2>FOR EASY ACCESS OF LOANS AND OTHER COMMODITIES</h2>
                    <p>We are prepared to offer the best services ever that you need.</p>
                </div>
                <div class="subscribe-btn" data-aos="fade-left" data-aos-delay="400" data-aos-offset="0">
                    <a href="signup" class="btn btn-primary">Create Account</a>
                </div>
            </div>
        </div>
    </section>
