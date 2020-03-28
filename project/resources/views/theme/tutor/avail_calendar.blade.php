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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-bootstrap/main.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    {{-- Custom Styling --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">

</head>

<style>
    .error-message
    {
        display: none;
    }
</style>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Adding Header --}}
        @include('theme.tutor.inc.header')
        {{-- End Header --}}

        <!-- Main Sidebar Container -->
        @include('theme.tutor.inc.sidebar')
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Availability Calender</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/tutor') }}">Home</a></li>
                                <li class="breadcrumb-item active">Availability Calender</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">Add Availability</button>


                <div class="container-fluid">
                    <div class="row">
                       
                        {{-- <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">Add Availability</button> --}}
                        {{-- <button type="button" class="btn btn-primary" id="add-new-event" >Add Event</button> --}}
                        <!-- /.col -->
                        {{-- <div class="col-md-12" id="external-events">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div> --}}
                        <!-- /.col -->




                    </br>
                    <div clas="row">
                           

                        <span class="b_username">
                            Schedule
                        </span>

                        <!-- /.user-block -->
                        <div class="row">
                            <p>
                                <div class="col-md-6">
                                    <p>
                                        <b>Sunday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_sunday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Sunday")
                                                    <p> 
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_sunday = '1';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_sunday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>

                                    <p>
                                        <b>Monday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_monday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Monday")
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }} 
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_monday = '1';
                                                    @endphp
                                                @endif
                                            @endforeach
                                            
                                        @endif
                                        @if ($is_monday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>

                                    <p>
                                        <b>Tuesday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_tuesday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Tuesday")
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_tuesday = '1';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_tuesday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>

                                    <p>
                                        <b>Wednesday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_wednesday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Wednesday")
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_wednesday = '1';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_wednesday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Thursday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_thursday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Thrusday")
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_thursday = '1';
                                                    @endphp                                               
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_thursday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>

                                    <p>
                                        <b>Friday:</b></br>
                                        {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                        @php
                                            $is_friday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Friday" )
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_friday = '1';
                                                    @endphp 
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_friday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>
                                    <p>
                                        <b>Saturday:</b></br>
                                        {{-- Midnight - 3:00 AM --}}
                                        @php
                                            $is_saturday = '0';
                                        @endphp
                                        @if ( count($user->availabilities) > 0 )
                                            @foreach ($user->availabilities as $availability )
                                                @if ($availability->title == "Saturday")
                                                    <p>
                                                        {{ $availability->start_time }} - {{ $availability->end_time }}
                                                        <a href="{{ url('/tutor/delete-availability') }}/{{ $availability->id }}">delete</a>
                                                    </p>
                                                    @php
                                                        $is_saturday = '1';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($is_saturday == '0')
                                            <p>Unavailable</p>
                                        @endif
                                    </p>
                                </div>
                            </p>

                        </div>

                    </div>










                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            {{-- <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Default box -->
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content --> --}}

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
        @include('theme.tutor.inc.footer')

    </div>
    <!-- ./wrapper -->

    {{-- Modal for Availability  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Availability</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="availability_form" >
                        @csrf

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}" >
                        </div>
                        
                        <div class="form-group">
                            <label for="day" class="col-form-label">Day</label>
                            <select class="form-control @error('day') is-invalid @enderror" name="day" data-placeholder="Days of Week">
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thrusday">Thrusday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            {{-- <input type="text" class="form-control" name="title" placeholder="Day"> --}}
                            <div class="error-message alert alert-danger error-t ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" placeholder="mm/dd/yyyy" >
                            <div class="error-message alert alert-danger error-sd ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" placeholder="mm/dd/yyyy" >
                            <div class="error-message alert alert-danger error-ed ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Start Time</label>
                            <input type="time" class="form-control" name="start_time" placeholder="hh:mm ss" >
                            <div class="error-message alert alert-danger error-st ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">End Time</label>
                            <input type="time" class="form-control" name="end_time" placeholder="hh:mm ss" >
                            <div class="error-message alert alert-danger error-et ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"id="add_event" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>

    

  
  </div> 

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('theme_asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('theme_asset/dist/js/demo.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('theme_asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-interaction/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
       
        


        jQuery(document).on('click', '#add_event', function (event) {
            event.preventDefault();

            console.log("Button Pressed.");

            let user_id = jQuery('input[name="user_id"]').val();
            let day = jQuery("select[name=day] option:selected").val();
            // let start_date = jQuery('input[name="start_date"]').val();
            // let end_date = jQuery('input[name="end_date"]').val();
            let start_time = jQuery('input[name="start_time"]').val();
            let end_time = jQuery('input[name="end_time"]').val();

            console.log("Day: "+ day);
            console.log("End Time: "+ start_time);
            console.log("Start Time: "+ end_time);




            // Bool Variables
            var is_user_id = false;
            var is_day = false; 
            // var is_start_date = false; 
            // var is_end_date = false; 
            var is_start_time = false; 
            var is_end_time = false; 

            if (!user_id )
            {
                // Error
                is_user_id = false;
                // jQuery('.error-fn').css("display","block");
                // jQuery('.error-fn').html("First name field is required.");
            }
            else
            {
                // Success
                is_user_id = true;
                // jQuery('.error-fn').css("display","none");
            }
            if (!day )
            {
                // Error
                is_day = false;
                jQuery('.error-t').css("display","block");
                jQuery('.error-t').html("Title field is required.");
            }
            else
            {
                // Success
                is_day = true;
                jQuery('.error-t').css("display","none");
            }
            // if (!start_date )
            // {
            //     // Error
            //     is_start_date = false;
            //     jQuery('.error-sd').css("display","block");
            //     jQuery('.error-sd').html("Start date field is required.");
            // }
            // else
            // {
            //     // Success
            //     is_start_date = true;
            //     jQuery('.error-sd').css("display","none");
            // }
            // if (!end_date )
            // {
            //     // Error
            //     is_end_date = false;
            //     jQuery('.error-ed').css("display","block");
            //     jQuery('.error-ed').html("End date field is required.");
            // }
            // else
            // {
            //     // Success
            //     is_end_date = true;
            //     jQuery('.error-ed').css("display","none");
            // }
            if (!start_time )
            {
                // Error
                is_start_time = false;
                jQuery('.error-st').css("display","block");
                jQuery('.error-st').html("Start time field is required.");
            }
            else
            {
                // Success
                is_start_time = true;
                jQuery('.error-st').css("display","none");
            }
            if (!end_time )
            {
                // Error
                is_end_time = false;
                jQuery('.error-et').css("display","block");
                jQuery('.error-et').html("End time field is required.");
            }
            else
            {
                // Success
                is_end_time = true;
                jQuery('.error-et').css("display","none");
            }

            // && (is_start_time == true) && (is_end_time == true)
            if ( (is_user_id == true) && (is_day == true) && (is_start_time == true) && (is_end_time == true)
                   )
            {
                AddAvailability(user_id, day, start_time, end_time);
            }
            else
            {
                // Error 400: Something bad happend
            }

        });


        function AddAvailability(user_id, day, start_time, end_time)
        {
            console.log("Ajax Calling !!! Add Availability !!!");
            jQuery.ajax({
                url: "{{ url('/tutor/add-availability') }}",
                type: "POST",
                data: { 
                    "_token": "{{ csrf_token() }}",
                    'user_id':user_id, 
                    'day':day,
                    // 'start_date':start_date,
                    // 'end_date':end_date,
                    'start_time':start_time,
                    'end_time':end_time
                },
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
                        
                        location.href = "{{ url('/tutor/general-availability') }}"						
                    }
                }
            });
        }

    </script>

</body>

</html>
