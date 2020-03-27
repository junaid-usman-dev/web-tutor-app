
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
                            <h1 class="m-0 text-dark">Favorite Tutor</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/student') }}">Home</a></li>
                                <li class="breadcrumb-item active">Favorite Tutor</li>
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
                        {{-- <div class="col-md-3">
                            <!-- Filter Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Filter Search</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <p class="text-muted mb-1">
                                        <strong>Hourly Rate:</strong> ${{ $min_price }} - ${{ $max_price }}+
                                    </p>
                                    <div class="slider-light">
                                        <input type="text" value="" name="filter_price" id="filter_price" class="slider form-control" data-slider-min="{{ $min_price }}"
                                            data-slider-max="{{ $max_price }}" data-slider-step="1" data-slider-value="[1,500]"
                                            data-slider-orientation="horizontal" data-slider-selection="before"
                                            data-slider-tooltip="show">
                                    </div>

                                    <hr>

                                    <p class="mb-1 text-muted"><strong>Availability:</strong>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <label class="form-check-label">Sunday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked>
                                                <label class="form-check-label">Monday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Tuesday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Wednesday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Thursday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Friday</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Saturday</label>
                                            </div>
                                        </div>
                                    </p>

                                    <hr>

                                    <p class="text-muted mb-1">
                                        <strong> Lesson Type:</strong>
                                    </p>
                                    
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            
                                            <label class="btn btn-primary ">
                                                <input type="radio" name="teaching_method" id="teaching_method" value="both" autocomplete="off" >
                                                Both
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="teaching_method" id="teaching_method" value="in-person" autocomplete="off"> In
                                                Person
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="teaching_method" id="teaching_method" value="online" autocomplete="off">
                                                Online
                                            </label>

                                        </div>
                                   
                                    <hr>

                                    <p class="text-muted mb-1">
                                        <strong>Tutor Age:</strong> 18 and up
                                    </p>
                                    <div class="slider-light">
                                        <input type="text" value="" class="slider form-control" data-slider-min="18"
                                            data-slider-max="65" data-slider-step="1" data-slider-value="[18,65]"
                                            data-slider-orientation="horizontal" data-slider-selection="before"
                                            data-slider-tooltip="show" >
                                    </div>
                                    <hr>
                                    <p class="text-muted mb-1">
                                        <strong> Gender:</strong>
                                    </p>
                                    <div class="form-group">

                                        <select class="form-control">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label"><strong>Backgound check on file</strong></label>
                                    </div>

                                    <hr>

                                    <p class="text-muted mb-1">
                                        <strong> Student's Level:</strong>
                                    </p>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Adult</option>
                                            <option>Child</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-md-10 mx-auto">
                            <div class="row">
                                <div class="col-md-12" id="tutor_list">
                                    <!-- start tutors card list-->

                                    @include('theme.student.partial.find_tutors',[
                                        'tutors' =>$tutors
                                    ])

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
        @include('theme.student.inc.footer');
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



    <script>
        // jQuery(".my-rating-8").starRating({
        //     totalStars: 5,
        //     starShape: 'rounded',
        //     starSize: 30,
        //     emptyColor: 'lightgray',
        //     hoverColor: 'salmon',
        //     activeColor: 'crimson',
        //     useGradient: false,
        //     useFullStars: true,
        //     // setRating: 3,
        //     // initialRating: 3,
        //     // callback: function(currentRating, $el){
        //     //     // alert('rated ' + currentRating);
        //     //     WriteReview (currentRating);
        //     //     // console.log('DOM element ', getRating);
        //     // }
        // });
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




    <script>
        $(function () {
            /* BOOTSTRAP SLIDER */
            $('.slider').bootstrapSlider()

            /* ION SLIDER */
            // $('#range_1').ionRangeSlider({
            //     min: 0,
            //     max: 5000,
            //     from: 1000,
            //     to: 4000,
            //     type: 'double',
            //     step: 1,
            //     prefix: '$',
            //     prettify: false,
            //     hasGrid: true
            // })
            // $('#range_2').ionRangeSlider()

            // $('#range_5').ionRangeSlider({
            //     min: 0,
            //     max: 10,
            //     type: 'single',
            //     step: 0.1,
            //     postfix: ' mm',
            //     prettify: false,
            //     hasGrid: true
            // })
            // $('#range_6').ionRangeSlider({
            //     min: -50,
            //     max: 50,
            //     from: 0,
            //     type: 'single',
            //     step: 1,
            //     postfix: '°',
            //     prettify: false,
            //     hasGrid: true
            // })

            // $('#range_4').ionRangeSlider({
            //     type: 'single',
            //     step: 100,
            //     postfix: ' light years',
            //     from: 55000,
            //     hideMinMax: true,
            //     hideFromTo: false
            // })
            // $('#range_3').ionRangeSlider({
            //     type: 'double',
            //     postfix: ' miles',
            //     step: 10000,
            //     from: 25000000,
            //     to: 35000000,
            //     onChange: function (obj) {
            //         var t = ''
            //         for (var prop in obj) {
            //             t += prop + ': ' + obj[prop] + '\r\n'
            //         }
            //         $('#result').html(t)
            //     },
            //     onLoad: function (obj) {
            //         //
            //     }
            // })
        })

    </script>

</body>

</html>

<script type="text/javascript" >

    // function ShowHideDiv() {
    
    //     var chkYes = document.getElementById("teaching_method");
    // }

    // jQuery(document).ready(function(){
    //     $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    //     jQuery("input[name='teaching_method']").change(function(event){
    //         event.preventDefault();
    //         FilterMethod ();
    //     });

    //     jQuery("input[name='filter_price']").change(function(event){
    //         event.preventDefault();
            
    //         // var filter_price = jQuery("#filter_price:min").val();

    //         // console.log(filter_price);
    //         // console.log("Price Filter Running.");
    //         FilterMethod();

    //     });

    // });

    function FilterMethod()
    {
        console.log("favorite tutor list");
        var is_favorite = "1";
        var teaching_methhod = jQuery("#teaching_method:checked").val();
        var filter_price = jQuery("#filter_price").val();

        // console.log(is_favorite + teaching_methhod + filter_price );

        console.log ("Ajax Calling !!!");
        // console.log("student/filter-by-teaching-meTthod'/"+teaching_methhod);
        jQuery.ajax({
            url: "{{ url('/student/tutor-list-filter') }}",
            type: "GET",
            data: {'is_favorite':is_favorite, 'teaching_methhod':teaching_methhod,'filter_price': filter_price },
            success: function(data)
            {
                if ( (data.success == null || data.success == undefined) )
                {
                    console.log("Error Message");
                    // jQuery(".alert-danger").css("display", "block");
                    // jQuery("#login_success").empty();
                    // jQuery('.alert-danger').html(response.error);
                }
                else  
                {
                    console.log("Success Message");
                    // jQuery(".alert-danger").css("display", "none");
                    // jQuery("#error_creditional").empty();
                    jQuery('#tutor_list').html(data.tutor_list);

                    
                    // location.href = "{{ url('/dashboard') }}"						
                }
            }
        });
    }


</script>


<?php 
    }
    else
    {
		// Go to welcome page
        header("Location: ".url('/signin'));exit;
    }
?>