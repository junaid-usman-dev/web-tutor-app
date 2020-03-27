
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

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>TutorLynx</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Start Navbar -->
        @include('theme.student.inc.header') 
        <!--End Navbar -->

        <!-- Start Sidebar -->
        @include('theme.student.inc.sidebar') 
        <!-- End Navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Student Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/student') }}">Home</a></li>
                                <li class="breadcrumb-item active">Student Dashboard</li>
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
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ url('/') }}/{{ $user->images->path }}/{{ $user->images->name }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->first_name }}
                                        {{ $user->last_name }}</h3>

                                    {{-- <p class="text-muted text-center">Student</p> --}}

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item"> <strong>Booked Tutors</strong> <a
                                                class="float-right">05</a> </li>
                                        <li class="list-group-item">
                                            <b>My Favourites</b> <a class="float-right">50</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Subjects</b> <a class="float-right">07</a>
                                        </li>
                                    </ul>
                                    <a href="{{ route('student.profile') }}" class="btn btn-primary btn-block"><strong>View Profile</strong></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    {{-- <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                    <p class="text-muted">
                                        Doing B.S. in History from the University of Tennessee at Knoxville
                                    </p>

                                    <hr> --}}

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">{{ $user->city }}, {{ $user->state }}, {{ $user->country }}
                                    </p>

                                    <hr>
                                    <strong><em class="fas fa-mobile-alt mr-1"></em> Cell No.</strong>
                                    <p class="text-muted">
                                        {{ $user->phone }}
                                    </p>

                                    <hr>
                                    <strong><em class="fas fa-birthday-cake mr-1"></em> Birthday</strong>
                                    <p class="text-muted">
                                        {{ Carbon\Carbon::parse( $user->birthday )->format('d M, Y') }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-envelope mr-1"></i> E-mail</strong>

                                    <p class="text-muted">{{ $user->email_address }}</p>

                                    {{-- <hr> --}}

                                    {{-- <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                        fermentum enim neque.</p> --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-6">

                                    <!-- Tutors LIST -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Favorite Tutors <span
                                                    class="badge badge-danger">{{ count($tutors) }}</span></h3>
                                            <div class="card-tools">

                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul class="users-list clearfix">
                                                @if ( count($tutors) > 0 )
                                                    @foreach ($tutors as $tutor)
                                                        <li>
                                                            <a href="{{ url('student/tutor-profile') }}/{{ $tutor->id }}"> 
                                                                <img src="{{ url('/') }}/{{ $tutor->images->path }}/{{ $tutor->images->name }}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a class="users-list-name" href="{{ url('student/tutor-profile') }}/{{ $tutor->id }}">{{ $tutor->first_name }} {{ $tutor->last_name }}</a>
                                                            <span class="users-list-date">Today</span>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <div class="ju-ta">
                                                        <p>There is no favorite tutor.</p>
                                                    </div>
                                                @endif

                                                {{-- <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Alexander Pierce</a>
                                                    <span class="users-list-date">Today</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user8-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Norman</a>
                                                    <span class="users-list-date">Yesterday</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Jane</a>
                                                    <span class="users-list-date">12 Jan</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user6-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">John</a>
                                                    <span class="users-list-date">12 Jan</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user2-160x160.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Alexander</a>
                                                    <span class="users-list-date">13 Jan</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user5-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Sarah</a>
                                                    <span class="users-list-date">14 Jan</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user4-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Nora</a>
                                                    <span class="users-list-date">15 Jan</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('theme_asset/dist/img/user3-128x128.jpg') }}"
                                                        alt="User Image">
                                                    <a class="users-list-name" href="#">Nadia</a>
                                                    <span class="users-list-date">15 Jan</span>
                                                </li> --}}

                                            </ul>
                                            <!-- /.users-list -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center"><a href="{{ route('student.favorite.tutors.list') }}">View All Tutors</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!--/.card -->
                                </div>

                                <div class="col-md-6">


                                    <!-- DIRECT CHAT -->
                                    @include('theme.student.partial.chat.chat',[
                                        'contact_list'=>$contact_list
                                        ])
                                    <!--/.end direct-chat -->

                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- TABLE: LATEST ORDERS -->
                                            <div class="card">
                                                <div class="card-header border-transparent">
                                                    <h3 class="card-title">Class Schedules</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. #</th>
                                                                    <th>Student</th>
                                                                    <th>Tutor</th>
                                                                    <th>Subject</th>
                                                                    <th>Start Time</th>
                                                                    <th>End Time</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($user->schedules as $schedule)
                                                                    
                                                                @endforeach
                                                                <tr>
                                                                    <td>01</td>
                                                                    <td><a href="{{ route('student.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                                    <td><a href="#">Jack Smith</a></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a"
                                                                            data-height="20">English</div>
                                                                    </td>
                                                                    <td>8:00 AM</td>
                                                                    <td>10:00 AM</td>


                                                                </tr>
                                                                <tr>
                                                                    <td>02</td>
                                                                    <td><a href="{{ route('student.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                                    <td><a href="#">John Smith</a></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a"
                                                                            data-height="20">English</div>
                                                                    </td>
                                                                    <td>8:00 AM</td>
                                                                    <td>10:00 AM</td>


                                                                </tr>
                                                                <tr>
                                                                    <td>03</td>
                                                                    <td><a href="{{ route('student.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                                    <td><a href="#">John Smith</a></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a"
                                                                            data-height="20">English</div>
                                                                    </td>
                                                                    <td>8:00 AM</td>
                                                                    <td>10:00 AM</td>


                                                                </tr>
                                                                <tr>
                                                                    <td>04</td>
                                                                    <td><a href="{{ route('student.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                                    <td><a href="#">John Smith</a></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a"
                                                                            data-height="20">English</div>
                                                                    </td>
                                                                    <td>8:00 AM</td>
                                                                    <td>10:00 AM</td>


                                                                </tr>
                                                                <tr>
                                                                    <td>05</td>
                                                                    <td><a href="{{ route('student.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                                    <td><a href="#">John Smith</a></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a"
                                                                            data-height="20">English</div>
                                                                    </td>
                                                                    <td>8:00 AM</td>
                                                                    <td>10:00 AM</td>


                                                                </tr>






                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer clearfix">
                                                    {{-- <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-primary float-left">Book New Class</a> --}}
                                                    <a href="{{ route('student.class.all') }}"
                                                        class="btn btn-sm btn-secondary float-right">View All
                                                        Classes</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
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
        <!--End Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>


    <script text="type/javascript">

        jQuery(document).on('click', 'a[name="view_conversation"]', function(event){
            event.preventDefault();

            console.log("Conversation Button Pressed.");
            var sender_id = jQuery("input[name=sender_id]").val();
            var contact_id = $(this).attr('data-contact_id');
            
            // Storing data attribute value to the input field.
            jQuery("input[name=receiver_id]").val(contact_id);
          
            Conversation(sender_id, contact_id);
        });
        jQuery(document).on('click', "#send_message", function(event){
            event.preventDefault();

            console.log("Conversation Button Pressed. : "+ $(this).attr('data-contact_id'));
            var sender_id = jQuery("input[name=sender_id]").val();
            var receiver_id = jQuery("input[name=receiver_id]").val();
            var message = jQuery("input[name=message").val();
            
            SendMessage(sender_id, receiver_id, message);
        });
    
        function Conversation(sender_id, contact_id)
        {
            console.log("AJAX Calling !!! Conversaton !!!");
            url = "{{ url('/student/message/view-conversation') }}/"+sender_id+"/"+contact_id;
    
            jQuery.ajax({
                url: url,
                type: "GET",
                data: { },
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
                        // jQuery(".direct-chat-contacts").css("display", "none");
                        jQuery(".review-success").css("display", "block");
    
                        jQuery('#conversation').html(data.conversation);
                        jQuery('.direct-chat-warning').removeClass('direct-chat-contacts-open');
                    }
                }
            });
        }

        function SendMessage(sender_id, receiver_id, message)
        {
            console.log("Send Message");
    
            jQuery.ajax({
                url: "{{ url('/student/message/conversation') }}",
                type: "get",
                data: { 'sender_id':sender_id, 'receiver_id':receiver_id, 'message':message },
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
                        // jQuery(".direct-chat-contacts").css("display", "none");
                        jQuery(".review-success").css("display", "block");
                        
                        jQuery('#conversation').html(data.conversation);
                        $("#send_message_form")[0].reset();
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