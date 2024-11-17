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
                        <li><a href="https://www.facebook.com/fh5co" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </nav>
            </div>
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="home"><i class="fa fa-university">Kilimani Sacco</i></a>
                <div class="group d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <a class="login-icon d-sm-none" href="#"><i class="fa fa-user"></i></a>
                </div>
                <a class="search-icon d-none d-md-block" href="#"><i class="fa fa-search"></i></a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About us</a></li>
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
    </header><br><br><br>
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="400" data-aos-duration="800">
                    <div class="title">
                        <h6 class="title-primary">about kilimani Sacco</h6>
                        <h1 class="title-blue">Home of greater opportunities.</h1>
                    </div>
                    <p>kilimani Sacco is a licenced deposit taking sacco established in 2004 whose main objective
                        was and is to lift the members social and economic welfare.We offer loans with lower rates
                    to our clients and customers which has lead to us being ranked in top ten institution with lower loan rates.
                We are committed to providing good services to you.</p>
                    <div class="media-element d-flex justify-content-between">
                        <div class="media">
                            <i class="fa fa-magic mr-4"></i>
                            <div class="media-body">
                                <h5>for enquiry call</h5>
                                +254726585990
                            </div>
                        </div>
                        <div class="media">
                            <i class="fa fa-envelope"></i>
                            <div class="media-body">
                                <h5>Email us on</h5>
                                info@kilimani.com
                            </div>
                        </div>
                    </div>
                    <a href="contact" class="btn btn-primary">contact us</a>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="400" data-aos-duration="800">
                    <div class="featured-img">
                        <img class="featured-big" src="public/images/6.jpeg" alt="Featured 1">
                        <img class="featured-small" src="public/images/3.jpeg" alt="Featured 2">
                    </div>
                </div>
            </div>
        </div>
    </section>
