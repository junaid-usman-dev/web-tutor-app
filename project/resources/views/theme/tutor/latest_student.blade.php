<?php
if (!empty(session()->get('session_tutor_id')) )
{

?>


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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TutorLynx</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- Start Rating SVG Master --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme_asset/star-rating-svg-master/src/css/star-rating-svg.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('theme.tutor.inc.header');
        <!-- End navbar -->

        <!-- Main Sidebar Container -->
        @include('theme.tutor.inc.sidebar');
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Latest Students</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/tutor') }}">Home</a></li>
                                <li class="breadcrumb-item active">Lastest Students</li>
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
                        <div class="col-md-10 mx-auto">
                            <div class="row">
                                <div class="col-md-12" id="tutor_list">
                                    <!-- start tutors card list-->
                                    {{-- ---------------------------------------------------------------------------- --}}

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                @if ( count($latest_students) > 0 )
                                                    <strong>{{ count($latest_students->unique("student_id") ) }} Students</strong>
                                                @else
                                                    <strong>0 Students</strong>
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">

                                                    <div class="row">
                                                        <div class="col-12">

                                                            @if ( count($latest_students->unique("student_id")) > 0 )

                                                                @foreach ($latest_students->unique("student_id") as $student)
                                                                    <div class="post">
                                                                        <div class="user-block">
                                                                            {{-- <span class="badge text-md  float-right">$30/hr</span> --}}
                                                                            <img class="img-circle img-bordered-sm"
                                                                                src="{{ url('/') }}/{{ $student->users->images->path }}/{{ $student->users->images->name }}"
                                                                                alt="user image">
                                                                            <span class="username">
                                                                                <a href="{{ url('/tutor/student-profile') }}/{{ $student->users->id }}">{{ $student->users->first_name }} {{ $student->users->last_name }}</a>
                                                                            </span>
                                                                            <span class="description">
                                                                                +{{ $student->users->phone }}
                                                                            </span>

                                                                        </div>
                                                                        <!-- /.user-block -->
                                                                        {{-- <p>Summary summary summary</p> --}}</br> </br>
                                                                    </div>
                                                            
                                                                    {{-- <div class="card-tools">
                                                                        sdfsdf
                                                                    </div> --}}
                                                                @endforeach

                                                            @else
                                                                <p>Result does not match to your choice.</p>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        {{-- ---------------------------------------------------------------------------- --}}

                                        <!-- end tutors card list -->
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
        @include('theme.tutor.inc.footer');
        ]);
        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

    {{-- Start Rating SVG Master --}}
    <script src="{{ asset('theme_asset/star-rating-svg-master/src/jquery.star-rating-svg.js') }}"></script>







</body>

</html>




<?php 
    }
    else
    {
		// Go to welcome page
        header("Location: ".url('/signin'));exit;
    }
?>
