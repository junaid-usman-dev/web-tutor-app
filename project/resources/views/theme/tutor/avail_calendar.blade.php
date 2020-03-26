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
                <div class="container-fluid">
                    <div class="row">
                       
                        <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">Add Availability</button>
                        {{-- <button type="button" class="btn btn-primary" id="add-new-event" >Add Event</button> --}}
                        <!-- /.col -->
                        <div class="col-md-12" id="external-events">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

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
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                            <div class="error-message alert alert-danger error-t ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" placeholder="mm/dd/yyyy" >
                            <div class="error-message alert alert-danger error-sd ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" placeholder="mm/dd/yyyy" >
                            <div class="error-message alert alert-danger error-ed ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

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
       
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })
                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendarInteraction.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function (eventEl) {
                    console.log(eventEl);
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                //Random default events
                events:
                [
                    @foreach($availabilities as $availability)
                    {
                        title : '{{ $availability->title }}',
                        start : '{{ $availability->start_date }}',
                        end : '{{ $availability->end_date }}',
                    },
                    @endforeach

                    // {
                    //     title: 'All Day Event',
                    //     start: new Date(y, m, 1),
                    //     backgroundColor: '#f56954', //red
                    //     borderColor: '#f56954', //red
                    //     allDay: true
                    // },
                    // {
                    //     title: 'Long Event',
                    //     start: new Date(y, m, d - 5),
                    //     end: new Date(y, m, d - 2),
                    //     backgroundColor: '#f39c12', //yellow
                    //     borderColor: '#f39c12' //yellow
                    // },
                    // {
                    //     title: 'Meeting',
                    //     start: new Date(y, m, d, 10, 30),
                    //     allDay: false,
                    //     backgroundColor: '#0073b7', //Blue
                    //     borderColor: '#0073b7' //Blue
                    // },
                    // {
                    //     title: 'Lunch',
                    //     start: new Date(y, m, d, 12, 0),
                    //     end: new Date(y, m, d, 14, 0),
                    //     allDay: false,
                    //     backgroundColor: '#00c0ef', //Info (aqua)
                    //     borderColor: '#00c0ef' //Info (aqua)
                    // },
                    // {
                    //     title: 'Birthday Party',
                    //     start: new Date(y, m, d + 1, 19, 0),
                    //     end: new Date(y, m, d + 1, 22, 30),
                    //     allDay: false,
                    //     backgroundColor: '#00a65a', //Success (green)
                    //     borderColor: '#00a65a' //Success (green)
                    // },
                    // {
                    //     title: 'Click for Google',
                    //     start: new Date(y, m, 28),
                    //     end: new Date(y, m, 29),
                    //     url: 'http://google.com/',
                    //     backgroundColor: '#3c8dbc', //Primary (light-blue)
                    //     borderColor: '#3c8dbc' //Primary (light-blue)
                    // }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });
            

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                //Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                ini_events(event)

                //Remove event from text input
                $('#new-event').val('')
            })
        })
        // jQuery(document).ready(function(){

        // });
        jQuery(document).on('click', '#add_event', function (event) {
            event.preventDefault();

            console.log("Button Pressed.");

            let user_id = jQuery('input[name="user_id"]').val();
            let title = jQuery('input[name="title"]').val();
            let start_date = jQuery('input[name="start_date"]').val();
            let end_date = jQuery('input[name="end_date"]').val();
            let start_time = jQuery('input[name="start_time"]').val();
            let end_time = jQuery('input[name="end_time"]').val();

            // Bool Variables
            var is_user_id = false;
            var is_title = false; 
            var is_start_date = false; 
            var is_end_date = false; 
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
            if (!title )
            {
                // Error
                is_title = false;
                jQuery('.error-t').css("display","block");
                jQuery('.error-t').html("Title field is required.");
            }
            else
            {
                // Success
                is_title = true;
                jQuery('.error-t').css("display","none");
            }
            if (!start_date )
            {
                // Error
                is_start_date = false;
                jQuery('.error-sd').css("display","block");
                jQuery('.error-sd').html("Start date field is required.");
            }
            else
            {
                // Success
                is_start_date = true;
                jQuery('.error-sd').css("display","none");
            }
            if (!end_date )
            {
                // Error
                is_end_date = false;
                jQuery('.error-ed').css("display","block");
                jQuery('.error-ed').html("End date field is required.");
            }
            else
            {
                // Success
                is_end_date = true;
                jQuery('.error-ed').css("display","none");
            }
            // if (!start_time )
            // {
            //     // Error
            //     is_start_time = false;
            //     jQuery('.error-st').css("display","block");
            //     jQuery('.error-st').html("Start time field is required.");
            // }
            // else
            // {
            //     // Success
            //     is_start_time = true;
            //     jQuery('.error-st').css("display","none");
            // }
            // if (!end_time )
            // {
            //     // Error
            //     is_end_time = false;
            //     jQuery('.error-et').css("display","block");
            //     jQuery('.error-et').html("End time field is required.");
            // }
            // else
            // {
            //     // Success
            //     is_end_time = true;
            //     jQuery('.error-et').css("display","none");
            // }

            // && (is_start_time == true) && (is_end_time == true)
            if ( (is_user_id == true) && (is_title == true) && (is_start_date == true) && (is_end_date == true)
                   )
            {
                AddAvailability(user_id, title, start_date, end_date, start_time, end_time);
            }
            else
            {
                // Error 400: Something bad happend
            }

        });




        function AddAvailability(user_id, title, start_date, end_date, start_time, end_time)
        {
            console.log("Ajax Calling !!! Add Availability !!!");
            jQuery.ajax({
                url: "{{ url('/tutor/add-availability') }}",
                type: "POST",
                data: { 
                    "_token": "{{ csrf_token() }}",
                    'user_id':user_id, 'title':title,
                    'start_date':start_date,
                    'end_date':end_date,
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
