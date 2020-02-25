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
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Start Navbar -->
        @include('theme.student.inc.header')
        <!-- End navbar -->

        <!-- Start Main Sidebar Container -->
        @include('theme.student.inc.sidebar')
        <!-- End Main Sidebar Container -->        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Student Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Student Profile</li>
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
                                                                        <img src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}" alt=""
                                                                            class="img-circle img-fluid">
                                                                    </div>
                                                                    <div class="col-9 ">
                                                                        <h2 class="username"><strong>Jane
                                                                                Micheal</strong></h2>
                                                                        <p class="text-lg">Student, Physics,
                                                                            Electronics, Biology, Chemistry</p>

                                                                        <p class="text-sm"> <em
                                                                                class="fas fa-clock  mr-1"></em>
                                                                            <strong>15 hours studying Biology</strong>
                                                                            out of 563 hours. </p>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 20px; ">
                                                                <h3>About Jane</h3>
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












                                                            <!-- /.user-block -->












                                                        </div>

















                                                    </div>
                                                </div>


                                                </p>

                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 text-center">

                            <!-- Profile Image -->
                            <div class="card-style_mobile text-center hide">
                                <a href="#" class="btn btn-primary"><strong>Contact Jane</strong></a>
                                <p class="text-center"> Biology Student </p>
                            </div>


                            <div class="card card-primary card-outline hide-card card-style card-style_desktop">
                                <div class="card-body box-profile">
                                    <div class="text-center ">
                                        <img class="profile-user-img img-fluid img-circle img-bordered-sm"
                                            src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Jane Michael</h3>

                                    <a href="#" class="btn btn-primary btn-block"><strong>Update Profle</strong></a>
                                    <hr>
                                    <strong><em class="fas fa-map-marker-alt mr-1"></em> Location</strong>
                                    <p class="text-muted">140 GCP, Johar Town, Lahore, Pakistan</p>

                                    <hr>
                                    <strong><em class="fas fa-mobile-alt mr-1"></em> Cell No.</strong>
                                    <p class="text-muted">
                                        +92 332 1234567
                                    </p>

                                    <hr>
                                    <strong><em class="fas fa-birthday-cake mr-1"></em> Birthday</strong>
                                    <p class="text-muted">
                                        12 Aug, 2005
                                    </p>

                                    <hr>


                                    <strong><i class="fas fa-envelope mr-1"></i> E-mail</strong>

                                    <p class="text-muted">student@gmail.com</p>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
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
    @include('theme.student.inc.footer')
    <!-- End Main Footer -->
    
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
