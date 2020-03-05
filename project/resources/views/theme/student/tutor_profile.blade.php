
{{-------   Star Rating  -----------------}}
@php
    $total_rating = 0;
    $obtain_rating = 0.0; // Obtain rating out of 5
    $number_of_ratings = count($tutor->reviews)*5;
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

@foreach ($tutor->reviews as $review) 
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
    $obtain_rating = ($total_rating/$number_of_ratings)*5; // obtaining rating reviews percentage out of 5
    $obtain_rating = number_format($obtain_rating,1);
    
    $five_star_progress = ( ($five_star*5)/$number_of_ratings)*100; // calculating five stars rating percentage out of 100
    $four_star_progress = ( ($four_star*4)/$number_of_ratings)*100; // calculating fourstars rating percentage out of 100
    $three_star_progress = ( ($three_star*3)/$number_of_ratings)*100;  // calculating three stars rating percentage out of 100
    $two_star_progress = ( ($two_star*3)/$number_of_ratings)*100; // calculating two stars rating percentage out of 100
    $one_star_progress = ( ($one_star*3)/$number_of_ratings)*100; // calculating one stars rating percentage out of 100
@endphp
{{-------   End Star Rating  -----------------}}




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
    {{-- Start Rating SVG Master --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_asset/star-rating-svg-master/src/css/star-rating-svg.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<style>
    .error-message
    {
        display: none;
    }
   
</style>

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
            <section class="content" >

                <div class="container-fluid">
                    <div class="row" id="left_large_card">
                        <!-- /.col -->

                        {{-- Left large card --}}
                            @include('theme.student.partial.star_rating',[
                            'tutor'=>$tutor
                            ])
                        {{-- End Left Large Card --}}
                        
                        

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
    jQuery(".my-rating-8").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 30,
        emptyColor: 'lightgray',
        hoverColor: '#FFD700',
        activeColor: '#FFC107',
        ratedColor: '#FFC107',
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


<script text="">

jQuery(document).ready(function(){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    jQuery("#write_review").click(function(event){
        event.preventDefault();

        console.log("Button Pressed.");

        var student_id = jQuery("input[name=student_id]").val();
        var tutor_id = jQuery("input[name=tutor_id]").val();

        var subject = jQuery("input[name=subject]").val();
        // var email = jQuery("input[name=email]").val();
        var review = jQuery("textarea[name=review]").val();
        var star =  Math.round( jQuery('.my-rating-8').starRating('getRating') );

        // console.log("Student ID : "+student_id);
        // console.log("Tutor ID : "+tutor_id);
        // console.log("Subject : "+subject);
        // console.log("Email : "+email);
        // console.log("Review : "+review);
        // console.log("Star Rating: "+ star );

        var is_subject = false;
        // var is_email = false;
        var is_review = false;
        var is_star = false;

        if (!subject )
        {
            // Error
            is_subject = false;
            jQuery('.error-sb').css("display","block");
            jQuery('.error-sb').html("Subject field is required.");
            console.log("Subject field is required");
        }
        else
        {
            // Success
            is_subject = true;
            jQuery('.error-sb').css("display","none");
            // console.log("Subject Field is required.");
        }
        // if (!email )
        // {
        //     // Error
        //     is_email = false;
        //     jQuery('.error-em').css("display","block");
        //     jQuery('.error-em').html("Email field is required.");
        //     console.log("Email field is required");
        // }
        // else
        // {
        //     // Success
        //     is_email = true;
        //     jQuery('.error-em').css("display","none");
        //     // console.log("Subject Field is required.");
        // }
        if (!review )
        {
            // Error
            is_review = false;
            jQuery('.error-re').css("display","block");
            jQuery('.error-re').html("Review field is required.");
            console.log("Review field is required");
        }
        else
        {
            // Success
            is_review = true;
            jQuery('.error-re').css("display","none");
        }

        if ( (is_subject == true) && (is_review == true) )
        {
            console.log("Ajax Calling !!!!  Write Review !!!!");
            jQuery.ajax({
                url: "{{ url('/student/write-review') }}",
                type: "GET",
                data: { 'student_id':student_id,'tutor_id':tutor_id, 'subject':subject, 'review':review, 'star':star },
                success: function(data)
                {
                    if ( (data.success == null || data.success == undefined) )
                    {
                        console.log("Error Message");
                        jQuery(".review-success").css("display", "none");
                        jQuery(".review-error").css("display", "block");
                        // jQuery('.alert-danger').html(response.error);
                    }
                    else  
                    {
                        console.log("Success Message");
                        $("#review_form")[0].reset(); // Reset Review Form 
                        jQuery(".review-error").css("display", "none");
                        jQuery(".review-success").css("display", "block");
                        $('.create_review').toggleClass('d-none'); // toggle review form

                        // jQuery('#tutor_list').html(data.success);
                        // location.href = "{{ url('/dashboard') }}"
                        // location.reload(); // reload the page.	
                        jQuery('#left_large_card').html(data.tutor);
				
                    }
                }
            });
        }
        else
        {
            jQuery(".review-success").css("display", "none");
            // jQuery(".review-error").css("display", "block");
            console.log("Some field are empty.");
        }
    });
});


jQuery(document).ready(function() {
    jQuery("#create_review").click(function(){

        $('.create_review').toggleClass('d-none')
        
    });
});
</script>