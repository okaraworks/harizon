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
<section class="services">
        <div class="container">
            <div class="title text-center">
                <h6>Our Commitments</h6>
                <h1 class="title-blue">Why Choose Us</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                            <img class="mr-4" src="assets/images/service1.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Liberty to Our Customers</h5>
                                Our clients are welcomed to ask any question which our customers will look into it.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                            <img class="mr-4" src="assets/images/service2.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Our Services</h5>
                                We offer services that are friendly to our clients and customers
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <img class="mr-4" src="assets/images/service3.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Discussion of the idea</h5>
                                We always welcome and honor the opinions of clients
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                            <img class="mr-4" src="assets/images/service4.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Loan Rates</h5>
                               We offer loans with least loan rate which are favourable to our customers.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                            <img class="mr-4" src="assets/images/service1.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Faster loan Application</h5>
                               We offer timely loan applications for all our clients to ensure that no resentments in our customers
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <img class="mr-4" src="assets/images/service5.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Elaboration of the core</h5>
                               We care for our client so we seek to offer any financial help.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'views/footer.php'?>
