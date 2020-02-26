<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>TutorLynx</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/profile/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/profile/dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#"> <em
                            class="far fa-comments"></em> <span class="badge badge-danger navbar-badge">3</span> </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('theme_asset/profile/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('theme_asset/profile/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('theme_asset/profile/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <!--  <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-white">
                <img src="{{ asset('theme_asset/profile/dist/img/TLLogo.png" alt="TutorLynx Logo') }}" class="brand-image img-circle" style="opacity: 1">
                <span class="brand-text font-weight-light"><img src="{{ asset('theme_asset/profile/dist/img/TL_txt_img.png') }}"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('theme_asset/profile/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Test
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Take a Test</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Result</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link"><em class="nav-icon fas fa-calendar-check"></em>
                                <p>
                                    Availability Calendar
                                    <!--  <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Admin Manager
                                    <!--  <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile Manager
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Mode</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Payment</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tutor Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tutor Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 ">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card-body card-comments">
                                                                <div class="row">
                                                                    <div class="col-2 text-left">
                                                                        <img src="{{ asset('theme_asset/profile/dist/img/user1-128x128.jpg') }}" alt=""
                                                                            class="img-circle img-fluid">
                                                                    </div>
                                                                    <div class="col-9 ">
                                                                        <h2 class="username"><strong>Nicole
                                                                                Pearson</strong></h2>
                                                                        <p class="text-lg">Private Tutor -Calculus,
                                                                            Physics, Electronics, Biology, Chemistry</p>
                                                                        <span class="text-sm"><em
                                                                                class="fas fa-star  text-warning"></em><em
                                                                                class="fas fa-star text-warning"></em><em
                                                                                class="fas fa-star text-warning"></em><em
                                                                                class="fas fa-star text-warning"></em><em
                                                                                class="fas fa-star text-warning"></em>
                                                                            5.0 <a href="#">(320 Ratings)</a></span>
                                                                        <p class="text-sm"> <em
                                                                                class="fas fa-clock  mr-1"></em>
                                                                            <strong>15 hours tutoring english</strong>
                                                                            out of 563 hours. </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 20px; ">
                                                                <h3>About Nicole</h3>
                                                                <hr>
                                                            </div>

                                                            <div class="post clearfix">


                                                                <span class="b_username">
                                                                    Bio
                                                                </span>


                                                                <!-- /.user-block -->
                                                                <p>
                                                                    I have more than 10 years of experience in teaching.
                                                                    I hold a Ph.D. and three Master's degrees in the
                                                                    fields of Physics, Electrical Engineering, Applied
                                                                    Mathematics, and Nuclear Engineering. I completed my
                                                                    graduate studies at UW-Madison and earned my B.S. at
                                                                    Princeton University. As such, the following is a
                                                                    non-comprehensive list of some of the subjects in
                                                                    which I have tutored past students. I am qualified
                                                                    to teach other subjects not listed, so please call
                                                                    or text me.
                                                                </p>

                                                            </div>


                                                            <span class="b_username">
                                                                Education
                                                            </span>


                                                            <!-- /.user-block -->
                                                            <p>

                                                                Princeton Univeristy
                                                                Chemical Engineering</p>
                                                            <p>
                                                                University of Wisconsin - Madison
                                                                PhD </p>
                                                            <p>Electrical Engineering / Physics / Nuclear Engineering
                                                                Masters

                                                            </p>




                                                            <hr>
                                                            <span class="b_username">
                                                                Policies
                                                            </span> <!-- /.user-block -->
                                                            <p><i class="fas fa-dollar-sign"></i> Hourly Rate:
                                                                <b>$55</b></br></p>
                                                            <p>
                                                                Rate details:<b> Sessions cancelled within 24 hours will
                                                                    be charged a one hour cancellation fee. Students who
                                                                    do not show will be charged a two hour cancellation
                                                                    fee.</b></p>

                                                            <p><i class="fas fa-calendar-times"></i> Lesson
                                                                cancellation: <b>24 hours notice required</b></br></p>
                                                            <p><i class="fas fa-bookmark"></i> <a href="#">No background
                                                                    check</a></br></p>
                                                            <p><i class="fas fa-award"></i> Your first lesson is backed
                                                                by our <a href="#">Good Fit Guarantee</a></br></p>

                                                            <hr>

                                                            <span class="b_username">
                                                                Schedule
                                                            </span>


                                                            <!-- /.user-block -->
                                                            <div class="row">
                                                                <p>
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <b>Sunday:</b></br>
                                                                            10: PM - Midnight
                                                                        </p>

                                                                        <p>
                                                                            <b>Monday:</b></br>
                                                                            Midnight - 3:00 AM, 10:00 PM - Midnight
                                                                        </p>

                                                                        <p>
                                                                            <b>Tuesday:</b></br>
                                                                            Midnight - 3:00 AM, 10:00 PM - Midnight
                                                                        </p>

                                                                        <p>
                                                                            <b>Wednesday:</b></br>
                                                                            Midnight - 3:00 AM, 10:00 PM - Midnight
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <b>Thursday:</b></br>
                                                                            Midnight - 3:00 AM, 10:00 PM - Midnight
                                                                        </p>

                                                                        <p>
                                                                            <b>Friday:</b></br>
                                                                            Midnight - 3:00 AM, 10:00 PM - Midnight
                                                                        </p>
                                                                        <p>
                                                                            <b>Saturday:</b></br>
                                                                            Midnight - 3:00 AM
                                                                        </p>
                                                                    </div>

                                                                </p>

                                                            </div>

                                                            <hr>

                                                            <span class="b_username">
                                                                Subjects
                                                            </span>


                                                            <!-- /.user-block -->
                                                            <p>
                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <p><b>Business</b></br>
                                                                            GRE, Microeconomics</p>

                                                                        <p><b>Computer</b></br>
                                                                            General Computer</p>

                                                                        <p><b>Corporate Training</b></br>
                                                                            General Computer, Microeconomics, Statistics
                                                                        </p>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p><b>Math</b></br>
                                                                            <a href="#">Chemical Engineering</a>,
                                                                            Electrical Engineering,
                                                                            ACT Math, Algebra 1, Algebra 2, Calculus,
                                                                            Geometry, Physics, Prealgebra, Precalculus,
                                                                            SAT Math, Statistics </p>

                                                                        <p><b>Test Preparation</b></br>
                                                                            ACT English, ACT Math, ACT Reading, ACT
                                                                            Science, GRE, SAT Math, SAT Writing </p>
                                                                    </div>
                                                                </div>
                                                            </p>

                                                            <hr>

                                                            <div style="margin-top: 20px; ">
                                                                <h3>Ratings and Reviews</h3>
                                                                <hr>
                                                            </div>
                                                            <span class="b_username">
                                                                Rating
                                                            </span>

                                                            <p> <span class="text-sm"><em
                                                                        class="fas fa-star  text-warning"></em><em
                                                                        class="fas fa-star text-warning"></em><em
                                                                        class="fas fa-star text-warning"></em><em
                                                                        class="fas fa-star text-warning"></em><em
                                                                        class="fas fa-star text-warning"></em> 5.0 <a
                                                                        href="#">(320 Ratings)</a></span></p>
                                                            <!-- /.user-block -->

                                                            <span>5 Star (75)</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="80" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 80%"></div>
                                                            </div>


                                                            <span>4 Star (30)</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="10" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 10%"></div>
                                                            </div>

                                                            <span>3 Star (0)</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 0%"></div>
                                                            </div>


                                                            <span>2 Star (0)</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 0%"></div>
                                                            </div>


                                                            <span>1 Star (0)</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 0%"></div>
                                                            </div>

                                                            <hr>


                                                            <span class="b_username">
                                                                Reviews
                                                            </span>

                                                            <!-- /.user-block -->
                                                            <p class="lead">Show reviews that mention</p>
                                                            <p>
                                                                <form action="#" method="post">
                                                                    <div class="input-group">
                                                                        <input type="text" name="message"
                                                                            placeholder="Search Reviews ..."
                                                                            class="form-control">
                                                                        <span class="input-group-append">
                                                                            <button type="submit"
                                                                                class="btn btn-primary"><i
                                                                                    class="fas fa-search"></i></button>
                                                                        </span>

                                                                    </div>

                                                                </form>
                                                                <button type="button" class="btn btn-primary"
                                                                    style=" margin-top:15px !important;">All
                                                                    Reviews</button>
                                                            </p>
                                                            <p>
                                                                <b>Solid tutoring</b></br>

                                                                Nicole is very thorough on reinforcing materials,
                                                                studying and helping organize to get work done. Very
                                                                effective use of time and super helpful. Very pleased
                                                                with progress.</br>
                                                                <span class="text-muted text-sm"><em>Allison, 13 lessons
                                                                        with Nicole </em></span>
                                                            </p>

                                                            <p>
                                                                <b>Excellent chemistry tutor</b></br>

                                                                Nicole helped my daughter for two hours for her AP
                                                                Chemistry class. He broke things down in a way she could
                                                                understand. After the tutoring session was over, I could
                                                                see she was much more at ease. Nicole has an in-depth
                                                                knowledge in Chemistry. I highly recommend him. </br>
                                                                <span class="text-muted text-sm"><em>Fernanda, 3 lessons
                                                                        with Nicole</em></span>
                                                            </p>


                                                            <p>
                                                                <b>Knowledgeable Tutor</b></br>

                                                                After Nicole reviewed with my daughter the confusing
                                                                concepts, she informed me that she is more confident
                                                                about her finals. He explained chemistry to her in
                                                                better and practical ways. Thank you, Nicole.</br>
                                                                <span class="text-muted text-sm"><em>Nasser, 1 lesson
                                                                        with Nicole</em></span>
                                                            </p>




                                                            <hr>
                                                            <div style="margin-top: 20px; ">
                                                                <h3><b>Other Fort Collins, CO Tutors</b></h3>
                                                                <p> <a href="#">Fort Collins</a>, <a href="#">CO Math
                                                                        Tutors - Fort CollinsM</a>, <a href="#">CO Test
                                                                        Preparation Tutors - Fort Collins</a>, <a
                                                                        href="#">CO Computer Tutors - Fort Collins</a>,
                                                                    <a href="#">CO Language Tutors - Fort Collins</a>,
                                                                    <a href="#">CO Elementary Education Tutors - Fort
                                                                        Collins</a>, <a href="#">CO English Tutors -
                                                                        Fort Collins</a>, <a href="#">CO Art Lessons</a>
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </p>

                                                </div>

                                                <hr>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card-style_mobile text-center"><a href="#"
                                    class="btn btn-primary"><strong>Contact Nicole</strong></a>
                                <p class="text-center"> Response time: <b>7 hours</b> </p>
                            </div>


                            <div class="card card-primary card-outline hide-card card-style card-style_desktop">
                                <div class="card-body box-profile">
                                    <div class="text-center ">
                                        <img class="profile-user-img img-fluid img-circle img-bordered-sm"
                                            src="{{ asset('theme_asset/profile/dist/img/user1-128x128.jpg') }}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Nicole Pearson</h3>

                                    <p class="text-center lead"><strong>$55</strong>/hour</p>

                                    <ul class="list-group list-group-unbordered mb-3 text-center">
                                        <li class="list-group-item">No subscriptions or upfront payments </li>
                                        <li class="list-group-item">
                                            Only pay for the time you need
                                        </li>
                                        <li class="list-group-item">
                                            Find the right fit, or your first hour is free
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block"><strong>Contact Nicole</strong></a>
                                    <p class="text-center"> Response time: <b>7 hours</b> </p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>

        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->


    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-sm">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <img src="{{ asset('theme_asset/profile/dist/img/TLLogo.png') }}" style="width: 30px; height: 30px; margin-top: -3px;">
        </div>
        <!-- Default to the left -->
        Copyright &copy; 2020 <a href="#">TutorLynx</a>. All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/profile/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/profile/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/profile/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
