<?php
    if (!empty(session()->get('session_student_id')) )
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

    <title>TutorLynx</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/profile/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/profile/dist/css/adminlte.css') }}">
    {{-- Add Custom CSS File --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">
 
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Start Rating SVG Master --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_asset/star-rating-svg-master/src/css/star-rating-svg.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('theme.student.inc.header');
        <!-- End navbar -->

        <!-- Main Sidebar Container -->
        @include('theme.student.inc.sidebar');
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
                                <li class="breadcrumb-item"><a href="{{ url('/student') }}">Home</a></li>
                                <li class="breadcrumb-item active">Tutor Reviews</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Reviews ({{ $reviews->total() }})</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">

                                                    @if ( count($reviews) > 0 )
                                                        @foreach ($reviews->sortByDesc('id') as $review)
                                                            <p>

                                                                <div class="my-rating-7 d-inline" data-rating="{{ $review->star_rating }}"></div>
                                                                </br>
                                                                <b>{{ $review->title }}</b></br>
                                                                {{ $review->description }} 
                                                                </br>
                                                                <span class="text-muted text-sm">
                                                                    <em>English, 13 lessons with Nicole </em>
                                                                </span>
                                                            </p>
                                                        @endforeach
                                                        <hr>
                                                        <div class="card-tools float-right">
                                                            {{ $reviews->links() }}
                                                        </div>
                                                    @else
                                                        The tutor has no review.
                                                    @endif

                                                    {{-- <p>
                                                        <b>Solid tutoring</b></br>

                                                        Nicole is very thorough on reinforcing materials,
                                                        studying and helping organize to get work done. Very
                                                        effective use of time and super helpful. Very pleased
                                                        with progress.</br>
                                                        <span class="text-muted text-sm"><em>Allison, 13 lessons
                                                                with Nicole </em></span>
                                                    </p> --}}

                                            </div>
                                        </div>
                                        <!-- input states -->
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                {{-- <hr> --}}
                                {{-- <div class="card-tools">
                                    <ul class="pagination pagination-sm float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                        Submit</button>
                                </div> --}}
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <!-- /.row -->
                    
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- End Main Content -->
        </div>
            <!-- Main Footer -->
            @include('theme.student.inc.footer');

    </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('theme_asset/profile/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('theme_asset/profile/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('theme_asset/profile/dist/js/adminlte.min.js') }}"></script>

        {{-- Start Rating SVG Master --}}
        <script src="{{ asset('theme_asset/star-rating-svg-master/src/jquery.star-rating-svg.js') }}"></script>
        
    <script>
        jQuery(".my-rating-7").starRating({
                totalStars: 5,
                starShape: 'rounded',
                activeColor: '#FFC108',
                starSize: 20,
                useGradient: false,
                readOnly: true
            });
    </script>


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