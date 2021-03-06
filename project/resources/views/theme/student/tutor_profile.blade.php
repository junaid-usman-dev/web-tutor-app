<?php
    if (!empty(session()->get('session_student_id')) )
    {
  
?>

{{-------   Star Rating  -----------------}}
@php
    $total_rating = 0;
    $obtain_rating = 0.0; // Obtain rating out of 5
    $number_of_ratings = count($tutor->reviews)*5;
    $total_reviews = count($tutor->reviews);
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
    if ($number_of_ratings != 0) {
        $obtain_rating = ($total_rating/$number_of_ratings)*5; // obtaining rating reviews percentage out of 5
        $obtain_rating = number_format($obtain_rating,1);
    
        $five_star_progress = ( ($five_star*5)/$number_of_ratings)*100; // calculating five stars rating percentage out of 100
        $four_star_progress = ( ($four_star*4)/$number_of_ratings)*100; // calculating fourstars rating percentage out of 100
        $three_star_progress = ( ($three_star*3)/$number_of_ratings)*100;  // calculating three stars rating percentage out of 100
        $two_star_progress = ( ($two_star*3)/$number_of_ratings)*100; // calculating two stars rating percentage out of 100
        $one_star_progress = ( ($one_star*3)/$number_of_ratings)*100; // calculating one stars rating percentage out of 100
    }


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
    {{-- Start Rating SVG Master --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_asset/star-rating-svg-master/src/css/star-rating-svg.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/select2/css/select2.css') }}">

    {{-- Full Calender --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-bootstrap/main.min.css') }}">

    {{-- Time Picker jQuery Plugin --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('theme_asset/TimePicki-master/css/timepicki.css') }}" >

    {{-- Add Custom CSS File --}}
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
                                <li class="breadcrumb-item"><a href="{{ url('/student') }}">Home</a></li>
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
                            @include('theme.student.partial.partial_tutor_profile',[
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

   

    {{-- Calender Modal --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="min-width: 75vw;">
            <div class="modal-content">
                
                <center>Availabilities</center>
                <div class="col-md-12" id="external-events">
                    {{-- <div class="card card-primary"> --}}
                        {{-- <div class="card-body p-0"> --}}
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        {{-- </div> --}}
                        <!-- /.card-body -->
                    {{-- </div> --}}
                    <!-- /.card -->
                </div>
                

            </div>
        </div>
    </div>


    

     {{-- Book Tutor Bootstrap Modal --}}
    {{-- Modal for Availability  --}}
    <div class="modal fade" id="BookingModal" tabindex="-1" role="dialog" aria-labelledby="BookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BookingModalLabel">Booking Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="availability_form" >
                        @csrf

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="student_id" value="{{ $user->id }}" >
                            <input type="hidden" class="form-control" name="tutor_id" value="{{ $tutor->id }}" >
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Subject</label>
                            <select class="form-control @error('subject') is-invalid @enderror" name="subject" data-placeholder="Select Subject" style="width: 100%;">
                                @foreach ($tutor->subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" name="subject"> --}}
                            <div class="error-message alert alert-danger error-t ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="day" class="col-form-label">Days of Week</label>
                            {{-- <select class="select2 @error('day') is-invalid @enderror"
                                name="day" multiple="multiple" data-placeholder="Select a Days of Week"
                                style="width: 100%;"> --}}

                            {{-- <select class="form-control @error('day') is-invalid @enderror" name="day" data-placeholder="Select Day" style="width: 100%;">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thrusday">Thrusday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            <div class="error-message alert alert-danger error-sd ju-ta" role="alert">
                                Error Message Goes Here
                            </div> --}}
                            <p> 
                                <span name="start_day"></span> - 
                                <span name="end_day"></span>
                            </p>
                            {{-- <p>End Day <span name="end_day"></span></p> --}}

                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Date Range</label>
                            <p> 
                                <span name="start_date"></span> - 
                                <span name="end_date"></span>
                            </p>
                            <input type="hidden" class="form-control" name="start_date" value="" >
                            <input type="hidden" class="form-control" name="end_date" value="" >
                            
                            {{-- <div class="error-message alert alert-danger error-sd ju-ta" role="alert"> --}}
                                {{-- Error Message Goes Here --}}
                            {{-- </div> --}}
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" placeholder="mm/dd/yyyy" >
                            <div class="error-message alert alert-danger error-ed ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Available Time Range</label>
                            <p> 
                                <span name="start_time"></span> - 
                                <span name="end_time"></span>
                            </p>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="recipient-name" class="col-form-label">Start Time</label>
                                    {{-- <input type="text" class="form-control" name="start_time" placeholder="24:00" > --}}
                                    <input type="text" name="start_time" class="time_element" value="" />
                                    <div class="error-message alert alert-danger error-st ju-ta" role="alert">
                                        Error Message Goes Here
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="recipient-name" class="col-form-label">End Time</label>
                                    <input type="text" name="end_time" class="time_element" value="" />
                                    {{-- <input type="text" class="form-control" name="end_time" placeholder="24:00" value=""> --}}
                                    <div class="error-message alert alert-danger error-et ju-ta" role="alert">
                                        Error Message Goes Here
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="error-message alert alert-danger error-bt ju-ta" role="alert">
                                Error Message Goes Here
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"id="book_schedule" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Book Tutor Bootstrap Modal --}}


    
    <input type="hidden" id="days" value="{{ $available_day_number }}" />



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

    {{-- Full Calender --}}
    <script src="{{ asset('theme_asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-interaction/main.min.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>

    {{-- Time Picker jQuery Plugin --}}
    <script src="{{ asset('theme_asset/TimePicki-master/js/timepicki.js') }}"></script>

    <script>
        
        $(document).ready(function(){
            $(".time_element").timepicki();
        });


        // availabilities evnet solution
        jQuery( document ).ready(function() {
            jQuery("#availabilities_button").click( function(){
                console.log('button clicked');
                var shInterval =  setInterval(function(){
                    if (jQuery(".modal.fade.bd-example-modal-lg.show").length > 0){
                        jQuery("button.fc-dayGridMonth-button.fc-button.fc-button-primary").click();
                    clearInterval(shInterval);
                    }
                }, 500);
            });
        });


        let tutor_booking = {!! $tutor_booking !!}
        tutor_booking = JSON.parse(tutor_booking)       


        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        }  
        function getDates(start_date, end_date)
        {
            var dateArray = new Array();
            var currentDate = start_date;
            while (currentDate < end_date) {
                dateArray.push(new Date (currentDate));
                currentDate = currentDate.addDays(1);
            }
            return dateArray;
        }



    // $(document).on('click', '.no-click', function(event) {
    //     event.preventDefault();
    // })
        // $('.no-click').click(function (event){
        //     event.preventDefault()
        // })

        // $('#my-button').click(function() {
        //     var moment = $('#calendar').fullCalendar('getDate');
        //     alert("The current date of the calendar is " + moment.format());
        // });
        // document.getElementById('my-button').addEventListener('click', function() {
        //     var date = calendar.getDate();
        //     alert("The current date of the calendar is " + date.toISOString());
        // });
        // function convert(str) {
        //     var date = new Date(str),
        //         mnth = ("0" + (date.getMonth() + 1)).slice(-2),
        //         day = ("0" + date.getDate()).slice(-2);
        //     return [date.getFullYear(), mnth, day].join("-");
        // }


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

            function add_events(calendar, new_events) {

                new_events.forEach((event) => {
                    calendar.addEvent(event)
                })
            }

            let render_count = 0

            var calendar = new Calendar(calendarEl, {
                height: 650,
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                selectable: true,
                // selectHelper: true,
                unselectAuto: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
            
                events: "{{ url('/student/tutor/'.$tutor->id.'/booking') }}",
                showNonCurrentDates: false,

                // editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },

                dayClick: function(date, jsEvent, view) { 
                    console.log('Clicked on: ' + date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear());  
                },

                // Calling Modal on event click
                eventClick: function(info) {

                    if (info.event.title == "Booked")
                    {
                        console.log("Already Booked");
                    }
                    else
                    {
                        var start_day = (moment.parseZone(info.event.start).format("dddd"));
                        var end_day = (moment.parseZone(info.event.start).format("dddd"));

                        var start_d = (moment.parseZone(info.event.start).format("YYYY-MM-DD"));
                        var end_d = (moment.parseZone(info.event.start).format("YYYY-MM-DD"));
                        
                        var start_time = (moment.parseZone(info.event.start).format("HH:mm"));
                        var end_time = (moment.parseZone(info.event.end).format("HH:mm"));

                        var start_time_12_hr = (moment.parseZone(info.event.start).format("hh:mm A"));
                        var end_time_12_hr = (moment.parseZone(info.event.end).format("hh:mm A"));

                        // var date = calendar.getDate();
                        // console.log(date);
                        // console.log ( info.event.title); // time

                        // console.log ( info.event.start); // date
                        // console.log ( info); 12:00

                        // console.log ("Start Date: "+ start_d);
                        // console.log ("End Date: "+ end_d);

                        // console.log ("Start Time: "+ start_time );
                        // console.log ("End Time: "+ end_time);
                        // console.log("--------- after ------------")
                        // console.log ("Start Time: "+ start_time_12_hr );
                        // console.log ("End Time: "+ end_time_12_hr);


                        jQuery('span[name="start_date"]').text(start_d); // span
                        jQuery('span[name="end_date"]').text(end_d); // span
                        jQuery('input[name="start_date"]').val(start_d); 
                        jQuery('input[name="end_date"]').val(end_d);

                        jQuery('span[name="start_time"]').text(start_time_12_hr);
                        jQuery('span[name="end_time"]').text(end_time_12_hr);
                        jQuery('input[name="start_time"]').val(start_time_12_hr);
                        jQuery('input[name="end_time"]').val(end_time_12_hr);

                        jQuery('span[name="start_day"]').text(start_day);
                        jQuery('span[name="end_day"]').text(end_day);
                        // Calling Popup
                        $('#BookingModal').modal('show');

                        return false;
                    } 
                }


            });

            calendar.render();

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

    

        function init_ratings() {
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
        }

        jQuery(document).ready(function(){
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

            init_ratings()

            // Performing toggle form action 
            $(document).on('click', "#write_review", function(event){
                event.preventDefault();

                ToggleForm();
            });

            // Submitting Reviews
            $(document).on('click', "#submit_review", function(event){
                event.preventDefault();

                SubmittingReview();
            });

            jQuery(document).on('click', '#book_schedule', function (event) {
                event.preventDefault();

                console.log("Button Pressed.");

                let student_id = jQuery('input[name="student_id"]').val();
                let tutor_id = jQuery('input[name="tutor_id"]').val();
                let subject = jQuery('select[name="subject"] option:selected').text();
                // let day = jQuery('select[name="day"] option:selected').text();
                let start_date = jQuery('input[name="start_date"]').val();
                let end_date = jQuery('input[name="end_date"]').val();
                let start_time = jQuery('input[name="start_time"]').val();
                let end_time = jQuery('input[name="end_time"]').val();

                let span_start_time = jQuery('span[name="start_time"]').text();
                let span_end_time = jQuery('span[name="end_time"]').text();

                console.log("------  Before 11 --------");
                // console.log("Student ID : "+ student_id);
                // console.log("Tutor ID : "+ tutor_id);
                // console.log("Subject : "+ subject);
                // // console.log("Day"+ day);
                // console.log("Start Date : "+ start_date);
                // console.log("End Date : "+ end_date);
                // console.log("Input Start Time : "+ start_time);
                // console.log("Input End Time : "+ end_time);

                // console.log("Span Start Time : "+ span_start_time);
                // console.log("Span End Time : "+ span_end_time);
                // console.log("-------  After 11 --------------");
                span_start_time = moment(span_start_time, "h:mm A").format("HH:mm") // Converting 12 hours to 24 hours
                span_end_time = moment(span_end_time, "h:mm A").format("HH:mm") // // Converting 12 hours to 24 hours
                
                start_time = moment(start_time, "h:mm A").format("HH:mm") // Converting 12 hours to 24 hours
                end_time = moment(end_time, "h:mm A").format("HH:mm") // // Converting 12 hours to 24 hours
                
                console.log("Span Start Time : "+ span_start_time);
                // console.log("Span End Time : "+ span_end_time);
                console.log("Input Start Time : "+ start_time);
                // console.log("Input End Time : "+ end_time);
                // console.log("---- End 11 --------");
                // console.log("Student ID"+ student_id);
                var is_start_valid = moment(start_time, "HH:mm", true).isValid();
                var is_end_valid = moment(end_time, "HH:mm", true).isValid();

                // Bool Variables
                var is_student_id = false;
                var is_tutor_id = false;
                var is_subject = false; 
                // var is_day = false; 
                var is_start_date = false; 
                var is_end_date = false; 
                var is_start_time = false; 
                var is_end_time = false; 

                // if (!user_id )
                // {
                //     // Error
                //     is_user_id = false;
                //     // jQuery('.error-fn').css("display","block");
                //     // jQuery('.error-fn').html("First name field is required.");
                // }
                // else
                // {
                //     // Success
                //     is_user_id = true;
                //     // jQuery('.error-fn').css("display","none");
                // }
                if (!subject )
                {
                    // Error
                    is_subject = false;
                    jQuery('.error-t').css("display","block");
                    jQuery('.error-t').html("Subject field is required.");
                }
                else
                {
                    // Success
                    is_subject = true;
                    jQuery('.error-t').css("display","none");
                }
                // if (!day )
                // {
                //     // Error
                //     is_day = false;
                //     jQuery('.error-t').css("display","block");
                //     jQuery('.error-t').html("Day field is required.");
                // }
                // else
                // {
                //     // Success
                //     is_day = true;
                //     jQuery('.error-t').css("display","none");
                // }
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
                if ( (is_subject == true) && (is_start_date == true) && (is_end_date == true)  )
                {
                    if ( is_start_valid == true && is_end_valid == true )
                    {
                        if ( (start_time >= span_start_time &&  start_time <= span_end_time )
                        && (end_time > span_start_time &&  end_time <= span_end_time )
                        )
                        {
                            if( start_time < end_time  )
                            {
                                console.log("------- start time in range ----------");
                                jQuery('.error-bt').css("display","none");
                                SetSchedule(student_id, tutor_id, subject, start_date, end_date, start_time, end_time);
                            }
                            else
                            {
                                console.log("------ Error22: Start Time is not valid. -------");
                                jQuery('.error-bt').css("display","block");
                                jQuery('.error-bt').html("You have chosen invalid booking time. Please Select the time from available time range!");
                            }
                        }
                        else
                        {
                            console.log("------ Error 11: Start Time is not valid. -------");
                            jQuery('.error-bt').css("display","block");
                            jQuery('.error-bt').html("You have chosen invalid booking time. Please Select the time from available time range!");
                        }
                    }
                    else
                    {
                        console.log("------ Error 00: Start Time is not valid. -------");
                        jQuery('.error-bt').css("display","block");
                        jQuery('.error-bt').html("You have chosen invalid booking time. Please Select the time from available time range!");
                    }
                }
                else
                {
                    // Error 400: Something bad happend
                }
            });
        });

        // ------  Submitting Review ---------
        function SubmittingReview()
        {
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
                            jQuery(".review-error").css("display", "none");
                            jQuery(".review-success").css("display", "block");

                            jQuery('#left_large_card').html(data.tutor);

                            init_ratings()
                            // $("#review_form")[0].reset(); // Reset Review Form
                            // jQuery("#review_form").trigger("reset"); // Reset Review Form
                            // $('.create_review').toggleClass('d-none'); // toggle review form

                            // jQuery('#tutor_list').html(data.success);
                            // location.href = "{{ url('/dashboard') }}"
                            // location.reload(); // reload the page.	
                    
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
        }

        // ------ Performing Toggle Form Action
        function ToggleForm()
        {
            console.log("<<<<<< Render Toggle >>>>>");
            jQuery('.review_form_toggle').toggleClass('d-none')
        }


        function SetSchedule(student_id, tutor_id, subject, start_date, end_date, start_time, end_time)
        {
            console.log("Ajax Calling !!! Add Class Schedule !!!");
            jQuery.ajax({
                url: "{{ url('/student/class-schedule') }}",
                type: "POST",
                data: { 
                    "_token": "{{ csrf_token() }}",
                    'student_id':student_id,
                    'tutor_id':tutor_id,
                    'subject':subject,
                    // 'day':day,
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
                        // jQuery('#tutor_list').html(data.tutor_list);
                        
                        // location.href = "{{ url('/student') }}"
                        location.href = "{{ url('/student/tutor-profile') }}/"+tutor_id						

                    }
                }
            });
        }

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