

{{-------   Star Rating  -----------------}}
@php
    $total_review = count($user->reviews); // Count total number of reviews
    $total_rating = 0;
    $obtain_rating = 0.0; // Obtain rating out of 5
    $number_of_ratings = count($user->reviews)*5;
    $five_star = 0; // total number of five stars
    $four_star = 0; // total number of four stars
    $three_star = 0; // total number of three stars
    $two_star = 0; // total number of two stars
    $one_star = 0; // total number of one stars
    $five_star_progress = 0;
    $four_star_progress = 0;
    $three_star_progress = 0;
    $two_star_progress = 0;
    $one_star_progress = 0;

@endphp

@foreach ($user->reviews as $review) 
    @php
        $total_rating += intval($review->star_rating); // calculating total reviews
    @endphp
    @if ($review->star_rating == "5")
    @php
        $five_star += 1; // sum of total five stars
    @endphp
    @elseif ($review->star_rating == "4")
        @php
            $four_star += 1; // sum of total four stars
        @endphp
    @elseif ($review->star_rating == "3")
        @php
            $three_star += 1; // sum of total three stars
        @endphp
    @elseif ($review->star_rating == "2")
        @php
            $two_star += 1; // sum of total two stars
        @endphp
    @elseif ($review->star_rating == "1")
        @php
            $one_star += 1; // sum of total one stars
        @endphp
    @endif
    
@endforeach
@php
    if ($number_of_ratings != 0) 
    {    
        $obtain_rating = ($total_rating/$number_of_ratings)*5; // obtaining rating reviews percentage out of 5
    
        $five_star_progress = ( ($five_star*5)/$number_of_ratings)*100; // calculating five stars rating percentage out of 100
        $four_star_progress = ( ($four_star*4)/$number_of_ratings)*100; // calculating fourstars rating percentage out of 100
        $three_star_progress = ( ($three_star*3)/$number_of_ratings)*100;  // calculating three stars rating percentage out of 100
        $two_star_progress = ( ($two_star*3)/$number_of_ratings)*100; // calculating two stars rating percentage out of 100
        $one_star_progress = ( ($one_star*3)/$number_of_ratings)*100; // calculating one stars rating percentage out of 100
    }
    

    
@endphp
{{-------   End Star Rating  -----------------}}


<?php
    if (!empty(session()->get('session_tutor_id')))
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
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- Start Rating SVG Master --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_asset/star-rating-svg-master/src/css/star-rating-svg.css') }}">
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
                                                                        <img src="{{ url('/') }}/{{ $user->images->path }}/{{ $user->images->name }}" alt=""
                                                                            class="img-circle img-fluid">
                                                                    </div>
                                                                    <div class="col-9 ">
                                                                        <h2 class="username"><strong>{{ $user->first_name }}
                                                                            {{ $user->last_name }}</strong></h2>
                                                                        <p class="text-lg">
                                                                            @if (count($user->subjects) > 0)
                                                                                @foreach ($user->subjects as $subject)
                                                                                    {{ $subject->name }}, 
                                                                                @endforeach    
                                                                            @endif
                                                                            
                                                                        </p>
                                                                        <span class="text-sm">
                                                                            {{-- <em class="fas fa-star  text-warning"></em>
                                                                            <em class="fas fa-star text-warning"></em>
                                                                            <em class="fas fa-star text-warning"></em>
                                                                            <em class="fas fa-star text-warning"></em>
                                                                            <em class="fas fa-star text-warning"></em> --}}
                                                                            <div class="my-rating-7 d-inline" data-rating="{{ $obtain_rating }}"></div>
                                                                            <div class="d-inline">
                                                                                {{ number_format($obtain_rating,1) }}
                                                                                <a href="#">( {{ $total_review }} Ratings)</a>
                                                                            </div>
                                                                        </span>
                                                                        <p class="text-sm"> <em
                                                                                class="fas fa-clock  mr-1"></em>
                                                                            <strong>15 hours tutoring english</strong>
                                                                            out of 563 hours. </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 20px; ">
                                                                <h3>About {{ $user->first_name }}</h3>
                                                                <hr>
                                                            </div>

                                                            <div class="post clearfix">


                                                                <span class="b_username">
                                                                    Bio
                                                                </span>


                                                                <!-- /.user-block -->
                                                                <p>
                                                                    {{ $user->summary }}
                                                                    {{-- I have more than 10 years of experience in teaching.
                                                                    I hold a Ph.D. and three Master's degrees in the
                                                                    fields of Physics, Electrical Engineering, Applied
                                                                    Mathematics, and Nuclear Engineering. I completed my
                                                                    graduate studies at UW-Madison and earned my B.S. at
                                                                    Princeton University. As such, the following is a
                                                                    non-comprehensive list of some of the subjects in
                                                                    which I have tutored past students. I am qualified
                                                                    to teach other subjects not listed, so please call
                                                                    or text me. --}}
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
                                                                <b>${{ $user->price_per_hour }}</b></br></p>
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
                                                                    @if ( count($user->subjects) > 0 )
                                                                        @foreach ($user->subjects as $subject)
                                                                            <div class="col-md-6">
                                                                                <p>
                                                                                    <b>{{ $subject->name }}</b></br>
                                                                                    {{ $subject->description }}
                                                                                </p>
                                                                                {{-- <p>
                                                                                    <b>Computer</b></br>
                                                                                    General Computer
                                                                                </p> --}}
                                                                                {{-- <p>
                                                                                    <b>Corporate Training</b></br>
                                                                                    General Computer, Microeconomics, Statistics
                                                                                </p> --}}
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        Tutor has no subject list.
                                                                    @endif
                                                                    
                                                                    {{-- <div class="col-md-6">
                                                                        <p>
                                                                            <b>Business</b></br>
                                                                            GRE, Microeconomics
                                                                        </p>
                                                                        <p>
                                                                            <b>Computer</b></br>
                                                                            General Computer
                                                                        </p>
                                                                        <p>
                                                                            <b>Corporate Training</b></br>
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

                                                                        <p>
                                                                            <b>Test Preparation</b></br>
                                                                            ACT English, ACT Math, ACT Reading, ACT
                                                                            Science, GRE, SAT Math, SAT Writing 
                                                                        </p>
                                                                    </div> --}}

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

                                                            <p> <span class="text-sm">
                                                                    {{-- <em class="fas fa-star  text-warning"></em>
                                                                    <em class="fas fa-star text-warning"></em>
                                                                    <em class="fas fa-star text-warning"></em>
                                                                    <em class="fas fa-star text-warning"></em>
                                                                    <em class="fas fa-star text-warning"></em> --}}
                                                                    <div class="my-rating-7 d-inline" data-rating="{{ $obtain_rating }}"></div>
                                                                    <div class="d-inline">
                                                                        {{ number_format($obtain_rating,1) }}
                                                                        <a href="#">( {{ $total_review }} Ratings)</a>
                                                                    </div>
                                                                </span>
                                                            </p>
                                                            <!-- /.user-block -->

                                                            <span>5 Star ({{ $five_star }})</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="{{ $five_star_progress }}" aria-valuemin="0"
                                                            aria-valuemax="100" style="width: {{ $five_star_progress }}%"></div>
                                                            </div>


                                                            <span>4 Star ({{ $four_star }})</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="{{ $four_star_progress }}" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: {{ $four_star_progress }}%"></div>
                                                            </div>

                                                            <span>3 Star ({{ $three_star }})</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="{{ $three_star_progress }}" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: {{ $three_star_progress }}%"></div>
                                                            </div>


                                                            <span>2 Star ({{ $two_star }})</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="{{ $two_star_progress }}" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: {{ $two_star_progress }}%"></div>
                                                            </div>


                                                            <span>1 Star ({{ $one_star }})</span>
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    aria-valuenow="{{ $one_star_progress }}" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: {{ $one_star_progress }}%"></div>
                                                            </div>

                                                            <hr>


                                                            <span class="b_username">
                                                                Reviews
                                                            </span>

                                                            <!-- /.user-block -->
                                                            {{-- <p class="lead">Show reviews that mention</p> --}}
                                                            <p>
                                                                {{-- <form action="#" method="post">
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

                                                                </form> --}}
                                                                <a href="{{ route('tutor.all.review') }}" class="btn btn-primary"
                                                                    style=" margin-top:15px !important;">All Reviews
                                                                </a>
                                                            </p>
                                                            
                                                            @if ( count($user->reviews) > 0 )
                                                                @php
                                                                    $count = 0;
                                                                @endphp
                                                                @foreach ($user->reviews->sortByDesc('id') as $review)
                                                                    @if ( $count < 3)
                                                                        <p>
                                                                            <b>{{ $review->title }}</b></br>
                                                                            {{ $review->description }} 
                                                                            </br>
                                                                            <span class="text-muted text-sm">
                                                                                <em>Allison, 13 lessons with Nicole </em>
                                                                            </span>
                                                                        </p>
                                                                    @endif
                                                                    @php
                                                                        $count += 1;
                                                                    @endphp
                                                                    
                                                                @endforeach
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

                                                            {{-- <p>
                                                                <b>Excellent chemistry tutor</b></br>

                                                                Nicole helped my daughter for two hours for her AP
                                                                Chemistry class. He broke things down in a way she could
                                                                understand. After the tutoring session was over, I could
                                                                see she was much more at ease. Nicole has an in-depth
                                                                knowledge in Chemistry. I highly recommend him. </br>
                                                                <span class="text-muted text-sm"><em>Fernanda, 3 lessons
                                                                        with Nicole</em></span>
                                                            </p> --}}


                                                            {{-- <p>
                                                                <b>Knowledgeable Tutor</b></br>

                                                                After Nicole reviewed with my daughter the confusing
                                                                concepts, she informed me that she is more confident
                                                                about her finals. He explained chemistry to her in
                                                                better and practical ways. Thank you, Nicole.</br>
                                                                <span class="text-muted text-sm"><em>Nasser, 1 lesson
                                                                        with Nicole</em></span>
                                                            </p> --}}




                                                            {{-- <hr>
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
                                                            </div> --}}

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
                            <div class="card-style_mobile text-center">
                                {{-- <a href="#" class="btn btn-primary"><strong>Contact {{ $user->first_name }}</strong></a> --}}
                                <p class="text-center"> Response time: <b>7 hours</b> </p>
                            </div>


                            <div class="card card-primary card-outline hide-card card-style card-style_desktop">
                                <div class="card-body box-profile">
                                    <div class="text-center ">
                                        <img class="profile-user-img img-fluid img-circle img-bordered-sm"
                                            src="{{ url('/') }}/{{ $user->images->path }}/{{ $user->images->name }}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>

                                    <p class="text-center lead"><strong>${{ $user->price_per_hour }}</strong>/hour</p>

                                    <ul class="list-group list-group-unbordered mb-3 text-center">
                                        <li class="list-group-item">No subscriptions or upfront payments </li>
                                        <li class="list-group-item">
                                            Only pay for the time you need
                                        </li>
                                        <li class="list-group-item">
                                            Find the right fit, or your first hour is free
                                        </li>
                                    </ul>
                                    {{-- <a href="#" class="btn btn-primary btn-block"><strong>Contact {{ $user->first_name }}</strong></a> --}}
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
    @include('theme.tutor.inc.footer');

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
    jQuery(".my-rating-8").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 30,
        emptyColor: 'lightgray',
        hoverColor: 'salmon',
        activeColor: 'crimson',
        useGradient: false,
        useFullStars: true,
        // setRating: 3,
        // initialRating: 3,
        // callback: function(currentRating, $el){
        //     // alert('rated ' + currentRating);
        //     WriteReview (currentRating);
        //     // console.log('DOM element ', getRating);
        // }
    });
    // Only read able rating
    $(".my-rating-7").starRating({
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