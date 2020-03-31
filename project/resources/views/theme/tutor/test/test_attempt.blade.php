
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
    {{-- Add Custom CSS File --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
                        <h1 class="m-0 text-dark">Tutor Test</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tutor Test</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    {{-- <div class="col-md-3">

                        <form role="form" method="POST" action="{{ url('tutor/update-image') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                            @csrf
                    
                            </form>
                     </div> --}}


                    <div class="col-md-9 m-auto">

                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Attempt Test</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ action('Users\Tutor\TutorController@SubmitTest') }}" accept-charset="UTF-8" >
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                                                                
                                                {{-- <div class="row">
                                                    <div class="col-sm-6">
                                                        total Question
                                                    </div>
                                                    <div class="col-sm-6">
                                                        Current Question
                                                    </div>
                                                </div> --}}

                                                @php
                                                //    echo "Total:" $questions->total();
                                                //    echo "Current Question" $questions->currentPage()
                                                @endphp
                                                @if ( count($test->questions) > 0)
                                                    @php
                                                        $count = 0; 
                                                        // $emptyArray = []; 
                                                    @endphp
                                                    @foreach ($test->questions as $question)
                                                        @php
                                                            // $emptyArray[$count] = $question->id; 
                                                            $count += 1;
                                                        @endphp    
                                                        <div class="form-group">
                                                            <label>
                                                                <small>Question {{ $count }}:</small>
                                                                <br>
                                                                 {{ $question->question }}
                                                            </label>
                                                            <div class="form-group">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="choice[{{ $question->id }}]" value="1">
                                                                    <label class="form-check-label"> {{ $question->option_1 }} </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="choice[{{ $question->id }}]" value="2">
                                                                    <label class="form-check-label">{{ $question->option_2 }}</label>
                                                                </div>

                                                                @if ( !empty($question->option_3)  )
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="choice[{{ $question->id }}]" value="3">
                                                                        <label class="form-check-label">{{ $question->option_3 }}</label>
                                                                    </div>
                                                                @endif

                                                                @if ( !empty($question->option_4)  )
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="choice[{{ $question->id }}]" value="4">
                                                                        <label class="form-check-label">{{ $question->option_4 }}</label>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>There is no Question.</p>
                                                @endif
                                                
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-2">
                                                                    <input type="hidden" class="form-control" name="test_id" value="{{ $test->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-2">
                                                                    <input type="hidden" class="form-control" name="total_questions" value="{{ $count }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-left">
                                        <button type="submit" id="submit" class="btn btn-primary">
                                            <i class="fas fa-check"></i>
                                            Submit
                                        </button>
                                        {{-- <button id="update" class="btn btn-success float-right">
                                            <i class="fas fa-check"></i>
                                            Next
                                        </button> --}}
                                    </div>
                                    <!-- input states -->
                                </form>
                            </div>
                            <!-- /.card-body -->
                            <hr>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
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
        <!-- End Main Content -->
    </div>
        <!-- Main Footer -->
        @include('theme.tutor.inc.footer');
        {{-- End Main Footer --}}

</div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme_asset/profile/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/profile/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_asset/profile/dist/js/adminlte.min.js') }}"></script>
    
<script>
    jQuery(".my-rating-7").starRating({
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