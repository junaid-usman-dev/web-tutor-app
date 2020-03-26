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
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        

        @include('theme.admin.inc.header')

        @include('theme.admin.inc.sidebar')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Test</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Test</li>
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
                        <div class="col-md-12">

                            <a href="{{ url('/admin/test/question/create') }}/{{ $test->id }}" class="btn btn-primary" >Add</a>


                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $test->name }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                @if ( count($test->questions) > 0 )
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach ($test->questions as $question)
                                                        @php
                                                            $count += 1;
                                                        @endphp
                                                        <div class="form-group">
                                                            <a href="{{ url('/admin/test/question/edit') }}/{{ $question->id }}" class="btn btn-primary float-right" >Edit</a>
                                                            <a href="{{ url('/admin/test/question/delete') }}/{{ $question->id }}" class="btn btn-primary float-right" style="margin-right: 5px;" >Delete</a>
                                                            <label>
                                                                <small>Question {{ $count }}:</small>
                                                                <br>
                                                                {{ $question->question }}
                                                            </label>
                                                            <div class="form-group">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="radio1" value="1"
                                                                    @if ( $question->answer == "1" )
                                                                        checked
                                                                    @endif
                                                                    >
                                                                    <label class="form-check-label">{{ $question->option_1 }}</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="radio1" value="2"
                                                                    @if ( $question->answer == "2" )
                                                                        checked
                                                                    @endif
                                                                    >
                                                                    <label class="form-check-label">{{ $question->option_2 }}</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="radio1" value="3"
                                                                    @if ( $question->answer == "3" )
                                                                        checked
                                                                    @endif
                                                                    >
                                                                    <label class="form-check-label">{{ $question->option_3 }}</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="radio1" value="4"
                                                                    @if ( $question->answer == "4" )
                                                                        checked
                                                                    @endif
                                                                    >
                                                                    <label class="form-check-label">{{ $question->option_4 }}</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else   
                                                    <p>There are no questions for this test.</p>
                                                @endif
                                                

                                            </div>
                                        </div>
                                        <!-- input states -->

                                    </form>
                                </div>
                                <!-- /.card-body -->
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
        {{-- End Main Footer --}}

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
</body>

</html>
