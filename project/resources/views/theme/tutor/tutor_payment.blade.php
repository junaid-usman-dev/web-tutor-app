


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
    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
        @include('theme.tutor.inc.header')
        <!-- End navbar -->

        <!-- Main Sidebar Container -->
        @include('theme.tutor.inc.sidebar')
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- /.col -->
            <div class="col-md-9 ju-m-zero">

                <div class="row">
                    <div class="col-md-9">

                        <!-- Tutors LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Payment Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" action="{{ route('student.submit.payment') }}"
                                    accept-charset="UTF-8" enctype="multipart/form-data" >
                                    @csrf

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
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <input type="hidden" class="form-control"
                                                        name="id" value="{{ $user->id }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Card Number</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror"
                                                        placeholder="Enter Card Number">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('card_number')
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
                                                <label>Month</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="month" class="form-control  @error('month') is-invalid @enderror"
                                                        placeholder="Moth" >
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('month')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="error-message alert alert-danger error-fn" role="alert">
                                                Error Message Goes Here
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Year</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="year" class="form-control @error('year') is-invalid @enderror"
                                                        placeholder="Year" >
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('year')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="error-message alert alert-danger error-ln" role="alert">
                                                Error Message Goes Here
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>CVV Number</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="cvv_number" class="form-control @error('cvv_number') is-invalid @enderror"
                                                        placeholder="Enter CVV Number">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('cvv_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="error-message alert alert-danger error-em" role="alert">
                                                Error Message Goes Here
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                    <div class="card-footer text-left">
                                        <button id="update" class="btn btn-primary">
                                            <i class="fas fa-check"></i>
                                              Update
                                        </button>
                                    </div>
                                    <!-- /.card-footer -->

                                </form>
                                <!-- /.users-list -->
                            </div>
                            
                        </div>
                        <!--/.card -->
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </div>

        <!-- Main Footer -->
        @include('theme.tutor.inc.footer')

    </div>


    <!-- jQuery -->
    <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('theme_asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

</body>

</html>


