
<?php
// if (!empty(session()->get('session_tutor_id')))
// {

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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="{{ asset('theme_asset/plugins/select2/css/select2.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('theme_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}"> --}}
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.css') }}">

</head>


<style>

    .valid {
        color: green;
    }
    .invalid {
        color: red;
    }
    .error-message{
        display: none;
    }

</style>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('theme.admin.inc.header');
    <!--End navbar -->

    <!-- Main Sidebar Container -->
    @include('theme.admin.inc.sidebar');
    <!-- End Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Test Question</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Test Question</li>
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

                    {{-- Left Small Card --}}
                    <div class="col-md-3">
                        {{-- <form role="form" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data" >
                            @csrf
                           
                        </form> --}}
                    </div>
                    {{-- End Left Small Card --}}

                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-9 ">

                                <!-- Tutors LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Test Question</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <form role="form" method="POST" action="{{ route('admin.test.question.update') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                                            @csrf

                                            {{-- Frontend Error --}}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                      {{-- Error --}}
                                                      <div class="alert error-message alert-danger alert-dismissible fade show profile-error" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          <strong>Error!</strong> Something went wronge, Please try later.
                                                      </div>
                                                      {{-- End Error --}}
                                                      {{-- Success --}}
                                                      <div class="alert error-message alert-success alert-dismissible fade show profile-success" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          <strong>Success!</strong> Your profile information has been updated.
                                                      </div>
                                                      {{-- End Success --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <input name="test_id" type="hidden" class="form-control" value="{{ $question->test_id }}" >
                                                            <input name="question_id" type="hidden" class="form-control" value="{{ $question->id }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- @if ( count($test->questions) > 0 )
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($test->questions as $question)
                                                    @php
                                                        $count += 1;
                                                    @endphp --}}

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Question Title</label>
                                                                <div class="input-group mb-2">
                                                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                                                        placeholder="Enter Question Title" value="{{ $question->question }}" >
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-envelope"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('title')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="error-message alert alert-danger error-em" role="alert">
                                                                Error Message Goes Here
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Option 1</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control @error('option_1') is-invalid @enderror" name="option_1"
                                                                        placeholder="Option 1" value="{{ $question->option_1 }}">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('option_1')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="error-message alert alert-danger error-fn" role="alert">
                                                                Error Message Goes Here
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Option 2</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control @error('option_2') is-invalid @enderror" name="option_2"
                                                                        placeholder="Option 2" value="{{ $question->option_2 }}" >
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('option_2')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="error-message alert alert-danger error-ln" role="alert">
                                                                Error Message Goes Here
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Option 3</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control @error('option_3') is-invalid @enderror" name="option_3"
                                                                        placeholder="Option 3" value="{{ $question->option_3 }}" >
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('option_3')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="error-message alert alert-danger error-fn" role="alert">
                                                                Error Message Goes Here
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Option 4</label>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control @error('option_4') is-invalid @enderror" name="option_4"
                                                                        placeholder="Option 4" value="{{ $question->option_4 }}" >
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas fa-user"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('option_4')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <div class="error-message alert alert-danger error-ln" role="alert">
                                                                Error Message Goes Here
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                {{-- @endforeach
                                            @endif --}}

                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Answer</label>
                                                        <select class="form-control @error('answer') is-invalid @enderror" name="answer"
                                                            data-placeholder="Select Answer" style="width: 100%;" >
                                                                @if ($question->answer == "1")
                                                                    
                                                                @endif
                                                            <option value="1"
                                                                @if ($question->answer == "1")
                                                                    selected = 'selected'
                                                                @endif
                                                            >Option 1</option>
                                                            <option value="2"
                                                                @if ($question->answer == "2")
                                                                    selected = 'selected'
                                                                @endif
                                                            >Option 2</option>
                                                            <option value="3"
                                                                @if ($question->answer == "3")
                                                                    selected = 'selected'
                                                                @endif
                                                            >Option 3</option>
                                                            <option value="4"
                                                                @if ($question->answer == "4")
                                                                    selected = 'selected'
                                                                @endif
                                                            >Option 4</option>

                                                        </select>
                                                    </div>
                                                    @error('answer')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-c" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer text-left">
                                                <button type="submit" name="action" value="finish" class="btn btn-primary">
                                                    <i class="fas fa-check"></i>
                                                   Update
                                                </button>
                                                {{-- <button type="submit" name="action" value="next" class="btn btn-success float-right">
                                                    <i class="fas fa-check"></i>
                                                    Update
                                                </button> --}}
                                            </div> 
                                        
                                            <!-- input states -->
                                        </form>
                                        
                                        <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!--/.card -->
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
    @include('theme.admin.inc.footer');
    <!-- End Main Footer -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('theme_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>

<script>
    
    //------------------------------------------------------------------------------
    //                My Script
    //------------------------------------------------------------------------------

    jQuery(document).ready(function(){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });


        jQuery(document).on('click', "#update434", function(event){
            event.preventDefault();
            console.log("Button Click.");
        });
    });



</script>
</body>

</html>



<?php 
// }
// else
// {
//     // Go to welcome page
//     header("Location: ".url('/signin'));exit;
// }
?>