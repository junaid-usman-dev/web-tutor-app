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

    <title>TutorLynx</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <!-- Theme style -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Header Section --}}
        @include('theme.tutor.inc.header')
        {{-- End Header Section --}}

        {{-- Side Bar Menu --}}
        @include('theme.tutor.inc.sidebar')
        {{-- End Side Bar Menu --}}


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Manage Classes</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('tutor.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Manage Classes</li>
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
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="card">
                                        
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive">
                                            
                                            <table id="example2" class="table table-bordered">
                                                    {{-- <a href="javascript::" class="btn col-2 btn-primary">Create</a> --}}
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student</th>
                                                        {{-- <th>Tutor</th> --}}
                                                        <th>Subject</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ( count($tutor_schedules) > 0 )
                                                        @php
                                                            $count = 0;
                                                        @endphp
                                                        @foreach ($tutor_schedules as $schedule)
                                                            @php
                                                                $count += 1;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $count }}</td>
                                                                <td>{{ $schedule->users->first_name }} {{ $schedule->users->last_name }}</td>
                                                                {{-- <td>{{ $schedule->tutor->first_name }} {{ $schedule->tutor->last_name }}</td> --}}
                                                                <td>{{ $schedule->subject }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($schedule->start_datetime)->format('g:i A') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($schedule->end_datetime)->format('g:i A') }}</td>
        
                                                                {{-- <td>
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        Action
                                                                    </button>
                                                                    <ul class="dropdown-menu" x-placement="bottom-start"
                                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                                                                        <li class="dropdown-item"><a href="javascript::">Edit</a></li>
                                                                        <li class="dropdown-item"><a href="javascript::">Delete</a>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </td> --}}
                                                                
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        Empty List   
                                                    @endif

                                                    
                                                      
                                                    {{-- <tr>
                                                        <td>2</td>
                                                        <td>Jack Smith </td>
                                                        <td>Tutor tutor</td>
                                                        <td>English</td>
                                                        <td>8:00</td>
                                                        <td>14:00</td>

                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                                                                <li class="dropdown-item"><a href="javascript::">Edit</a></li>
                                                                <li class="dropdown-item"><a href="javascript::">Delete</a>
                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>3</td>
                                                        <td>Jack Smith </td>
                                                        <td>Tutor tutor</td>
                                                        <td>English</td>
                                                        <td>8:00</td>
                                                        <td>14:00</td>

                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                                                                <li class="dropdown-item"><a href="javascript::">Edit</a></li>
                                                                <li class="dropdown-item"><a href="javascript::">Delete</a>
                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>4</td>
                                                        <td>Jack Smith </td>
                                                        <td>Tutor tutor</td>
                                                        <td>English</td>
                                                        <td>8:00</td>
                                                        <td>14:00</td>

                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                                                                <li class="dropdown-item"><a href="javascript::">Edit</a></li>
                                                                <li class="dropdown-item"><a href="javascript::">Delete</a>
                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>5</td>
                                                        <td>Jack Smith </td>
                                                        <td>Tutor tutor</td>
                                                        <td>English</td>
                                                        <td>8:00</td>
                                                        <td>14:00</td>

                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                                                                <li class="dropdown-item"><a href="javascript::">Edit</a></li>
                                                                <li class="dropdown-item"><a href="javascript::">Delete</a>
                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr> --}}

                                                </tbody>

                                            </table>
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
        @include('theme.admin.inc.footer')
        {{-- End Footer--}}


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

    <!-- DataTables -->
    <script src="{{ asset('theme_asset/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('theme_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            /* BOOTSTRAP SLIDER */
            $('.slider').bootstrapSlider()

            /* ION SLIDER */
            $('#range_1').ionRangeSlider({
                min: 0,
                max: 5000,
                from: 1000,
                to: 4000,
                type: 'double',
                step: 1,
                prefix: '$',
                prettify: false,
                hasGrid: true
            })
            $('#range_2').ionRangeSlider()

            $('#range_5').ionRangeSlider({
                min: 0,
                max: 10,
                type: 'single',
                step: 0.1,
                postfix: ' mm',
                prettify: false,
                hasGrid: true
            })
            $('#range_6').ionRangeSlider({
                min: -50,
                max: 50,
                from: 0,
                type: 'single',
                step: 1,
                postfix: '°',
                prettify: false,
                hasGrid: true
            })

            $('#range_4').ionRangeSlider({
                type: 'single',
                step: 100,
                postfix: ' light years',
                from: 55000,
                hideMinMax: true,
                hideFromTo: false
            })
            $('#range_3').ionRangeSlider({
                type: 'double',
                postfix: ' miles',
                step: 10000,
                from: 25000000,
                to: 35000000,
                onChange: function (obj) {
                    var t = ''
                    for (var prop in obj) {
                        t += prop + ': ' + obj[prop] + '\r\n'
                    }
                    $('#result').html(t)
                },
                onLoad: function (obj) {
                    //
                }
            })
        })

    </script>
    <script src="{{ asset('theme_asset/dist/js/demo.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
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