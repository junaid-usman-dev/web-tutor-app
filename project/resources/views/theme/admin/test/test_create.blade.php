
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
                        <h1 class="m-0 text-dark">Create Test</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Test</li>
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
                        <form role="form" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data" >
                            @csrf
                           
                        </form>
                    </div>
                    {{-- End Left Small Card --}}

                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-9 ">

                                <!-- Tutors LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Test</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('admin.test.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
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
                                                        <label>Choose Subject</label>
                                                        <div class="input-group mb-2">
                                                            <select class="form-control bdr-right" name="subject" data-placeholder="Select Subject" style="width: 100%;" value={{ old('subject') }} >
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('subject')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-em" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Test Title</label>
                                                        <div class="input-group mb-2">
                                                            <input name="test" type="text" class="form-control @error('test') is-invalid @enderror"
                                                                placeholder="Enter Test Title" value={{ old('test') }} >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-envelope"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('test')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-em" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Short Description</label>
                                                        <div class="input-group mb-2">
                                                            <input name="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                                                placeholder="Enter Description"  value={{ old('description') }} >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-envelope"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-em" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer text-left">
                                                <button id="create" class="btn btn-primary">
                                                    <i class="fas fa-check"></i>
                                                    Create
                                                </button>
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

<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('theme_asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('theme_asset/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('theme_asset/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('theme_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>

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