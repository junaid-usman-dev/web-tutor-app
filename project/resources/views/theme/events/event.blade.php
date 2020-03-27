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

    
    
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fullcalendar-bootstrap/main.min.css') }}">
   

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Availability Calender</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div>
                <div class="container-fluid">
                    <div class="row">

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
                <img src="dist/img/TLLogo.png" style="width: 30px; height: 30px; margin-top: -3px;">
            </div>
            <!-- Default to the left -->
            Copyright &copy; 2020 <a href="#">TutorLynx</a>. All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    
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

            // new Draggable(containerEl, {
            //     itemSelector: '.external-event',
            //     eventData: function (eventEl) {
            //         console.log(eventEl);
            //         return {
            //             title: eventEl.innerText,
            //             backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
            //                 'background-color'),
            //             borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
            //                 'background-color'),
            //             textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            //         };
            //     }
            // });

            var calendar = new Calendar(calendarEl, {
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                //Random default events
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: true
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor: '#0073b7' //Blue
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor: '#00c0ef' //Info (aqua)
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor: '#00a65a' //Success (green)
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    }
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

            // /* ADDING EVENTS */
            // var currColor = '#3c8dbc' //Red by default
            // //Color chooser button
            // var colorChooser = $('#color-chooser-btn')
            // $('#color-chooser > li > a').click(function (e) {
            //     e.preventDefault()
            //     //Save color
            //     currColor = $(this).css('color')
            //     //Add color effect to button
            //     $('#add-new-event').css({
            //         'background-color': currColor,
            //         'border-color': currColor
            //     })
            // })
            // $('#add-new-event').click(function (e) {
            //     e.preventDefault()
            //     //Get value and make sure it is not null
            //     var val = $('#new-event').val()
            //     if (val.length == 0) {
            //         return
            //     }

            //     //Create events
            //     var event = $('<div />')
            //     event.css({
            //         'background-color': currColor,
            //         'border-color': currColor,
            //         'color': '#fff'
            //     }).addClass('external-event')
            //     event.html(val)
            //     $('#external-events').prepend(event)

            //     //Add draggable funtionality
            //     ini_events(event)

            //     //Remove event from text input
            //     $('#new-event').val('')
            // })
        })

    </script>

</body>

</html>
