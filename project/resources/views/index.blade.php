<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TutorLynx</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme_asset/home/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('theme_asset/home/css/bootstrap-4.2.1.css') }}" rel="stylesheet">

    <!-- icons -->
    <script src="https://kit.fontawesome.com/ac9913b312.js" crossorigin="anonymous"></script>
    <!-- Custom -->
    <link href="{{ asset('theme_asset/home/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_asset/custom/css/custom.css') }}" rel="stylesheet">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="{{ asset('theme_asset/home/images/tl_logo.png') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a class="btn btn-info active" href="#">Find A Tutor</a> </li>
                        <li class="nav-item "> <a class="btn btn-info" href="#">How it Works</a> </li>
                        <li class="nav-item "> <a class="btn btn-info" href="#">Resources</a> </li>
                        <li class="nav-item "> <a class="btn btn-info" href="#">Start Tutoring</a> </li>
                        <li class="nav-item "> <a class="btn btn-info" href="{{ url('/about') }}">About Us</a> </li>
                        <li class="nav-item "> <a class="btn btn-warning" href="{{ url('/signin') }}">Signin</a> </li>
                        <li class="nav-item "> <a class="btn btn-warning" href="{{ url('/signup') }}">Singup</a> </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>


    <header>
        <div class="main_img">
            <div class="container ">
                <div class="row p-0 m-0">
                    <div class="col-md-6 p-0 m-0 hide">
                        <h1 class="text-left p-0 m-0"><img src="{{ asset('theme_asset/home/images/main_img.png') }}"
                                class="img-fluid">
                    </div>
                    <div class="col-md-12">
                        <div class="margin-desk">
                            <h1 class="text-center heading_color_blue "><strong>LEARN</strong> on your terms from an
                                expert tutor.</h1>
                            <p class="text-center txt_med">Private, 1–on–1 lessons with the expert instructor of your
                                choice. You decide when to meet, how much to pay, and who you want to work with.</p>
                            <p>&nbsp;</p>
                            <p class="text-center"><a class="btn btn-info" href="#">Get Help &nbsp;&nbsp;<i
                                        class="fa fa-arrow-circle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="m_topbott100">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 mb-4 mt-2 text-center">
                    <h2 class="heading_color_blue txt_capital">Learn from the nation’s largest<br>
                        <strong>community of professional tutors.</strong></h2>
                </div>
            </div>
        </div>
        <div class="container m_bott80 ">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img_border img_shadow" alt="200x200" style="width: 200px; height: 200px;"
                        src="{{ asset('theme_asset/home/images/blk_1.jpg') }}" data-holder-rendered="true">
                    <h3 class="heading_color_blue">VETTED EXPERTS.</h3>
                    <p class="txt_small">More qualified instructors than anywhere<br>
                        else, ready to help.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img_border img_shadow" alt="200x200" style="width: 200px; height: 200px;"
                        src="{{ asset('theme_asset/home/images/blk_2.jpg') }}" data-holder-rendered="true">
                    <h3 class="heading_color_blue">THE RIGHT FIT.</h3>
                    <p class="txt_small">Find an expert who suits your needs<br>
                        and learning style</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img_border img_shadow" alt="200x200" style="width: 200px; height: 200px;"
                        src="{{ asset('theme_asset/home/images/blk_3.jpg') }}" data-holder-rendered="true">
                    <h3 class="heading_color_blue">REAL RESUTLS.</h3>
                    <p class="txt_small">Reach your goals faster with private,<br>
                        1-to-1 lessons.</p>
                </div>
            </div>




        </div>

        <div class="container m_bott80">
            <div class="row">
                <div class="col-md-12 txt_small tl_cities">
                    <ul>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> NEWYORK CITY</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> WASHINGTON DC</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> BAY AREA</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> PHOENIX</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> MIAMI</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> ATLANTA</li>
                        <li><img src="{{ asset('theme_asset/home/images/bullet_ico.png') }}"> DALLAS</li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="text-left col-md-9 col-12 mx-auto">
                        <div class="row">
                            <div class="col-md-3"><img src="{{ asset('theme_asset/home/images/gaurantee_badge.png') }}">
                            </div>
                            <div class="col-md-9">
                                <p class="lead m_top30"><strong>Find the right fit or it’s FREE.</strong></p>
                                <p class="txt_norm">We guarantee you’ll find the right tutor, or we’ll cover the first
                                    hour of your lesson.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <section class="pt-5" id="testimonial-section">
                <h2 class="text-center mb-1 heading_color_blue"><span>Don’t just take our word for it. See what students
                        have to say...</span><br>
                    <img src="{{ asset('theme_asset/home/images/quote.png') }}" style="margin-top: 20px;">
                </h2>
                <div class="clearfix pb-3"></div>
                <div id="testimonials" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonials" data-slide-to="1"></li>
                        <li data-target="#testimonials" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner m_bott80">
                        <div class="carousel-item active">
                            <div class="testi-text-wrap">
                                <h2 class="txt_med text-center">Isaac is a very good tutor. I was failing a class I
                                    needed to pass <br>
                                    to graduate and thanks to Isaac, I did pass the class and graduated.</h2>
                            </div>
                            <div class="testi-footer  mb-5">
                                <div class="testi-ftr-wrap text-center">
                                    <span class="cust_pro text-center">LuAnn from Chicago, IL</span></div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testi-text-wrap">
                                <h2 class="txt_med text-center">Isaac is a very good tutor. I was failing a class I
                                    needed to pass <br>
                                    to graduate and thanks to Isaac, I did pass the class and graduated.</h2>
                            </div>
                            <div class="testi-footer  mb-5">
                                <div class="testi-ftr-wrap text-center">
                                    <span class="cust_pro text-center">LuAnn from Chicago, IL</span></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testi-text-wrap">
                                <h2 class="txt_med text-center">Isaac is a very good tutor. I was failing a class I
                                    needed to pass <br>
                                    to graduate and thanks to Isaac, I did pass the class and graduated.</h2>
                            </div>
                            <div class="testi-footer  mb-5">
                                <div class="testi-ftr-wrap text-center">
                                    <span class="cust_pro text-center">LuAnn from Chicago, IL</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>

    <footer class="text-left footer_bg">
        <div class="container">
            <div class="row">

                <div class="col-md-6 f_links">
                    <h3>GET TO KNOW US</h3>
                    <p><a href="#">Find A Tutor</a> <a href="#">How it Works</a> <a href="#">Resources</a> <a
                            href="#">Start Tutoring</a> <a href="#">About Us</a> </p>
                    <div class="footer_borders">
                        <a href="#" class="btn btn-info">Login</a> <a href="#" class="btn btn-info">Signup</a>
                    </div>
                    <p class="txt_small">© 2020, All Rights Reserved.</p>
                </div>
                <div class="col-md-4 f_mlinks">
                    <h3>LET'S KEEP IN TOUCH</h3>
                    <p><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a> <a href="#"><i
                                class="fab fa-instagram-square fa-2x"></i></a> <a href="#"><i
                                class="fab fa-twitter-square fa-2x"></i></a> <a href="#"><i
                                class="fab fa-linkedin fa-2x"></i></a></p>
                    <h3>FEELING LOST?</h3>
                    <p class="txt_small" style="color: #879dc0;">Give us a call: <strong style="color: #fff">(312)
                            646-6365</strong> <br> or <br>
                        Write to us: <a href="mailto:info@TutorLynx.com">info@TutorLynx.com</a></p>

                </div>


                <div class="col-md-2 text-center"><img src="{{ asset('theme_asset/home/images/footer_logo.png') }}">
                </div>

            </div>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('theme_asset/home/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('theme_asset/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme_asset/home/js/bootstrap-4.2.1.js') }}"></script>
</body>

</html>
