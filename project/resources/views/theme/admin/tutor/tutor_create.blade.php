
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
<link rel="stylesheet" href="{{ asset('theme_asset/plugins/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('theme_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
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
                        <h1 class="m-0 text-dark">Create Tutor Pofile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Tutor Profile</li>
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

                        <form role="form" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data" >
                            @csrf
                    
                            <!-- Profile Image -->
                            {{-- <div class="card card-primary card-outline">
                                <div class="card-body box-profile"> --}}
                                    {{-- <div class="text-center">
                                        <input type="file" id="upload_image" name="upload_image" value=""  class="d-none">
                                            <img name="image" id="image" style="cursor:pointer;" class="profile-user-img img-fluid img-circle"
                                                src="#" alt="User profile picture">
                                    </div> --}}
                                    {{-- <br> --}}
                                    {{-- <h3 class="profile-username text-center">FirstName LastName</h3> --}}
                                    {{-- <input type="submit" class="btn btn-primary btn-block" value="Update Profile Pic"> --}}
                                    {{-- <button class="btn btn-primary btn-block">
                                        <strong>Update Profile Pic</strong>
                                    </button> --}}
                                {{-- </div> --}}
                                    <!-- /.card-body -->
                            {{-- </div> --}}
                              <!-- /.card -->
                        </form>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-9">

                                <!-- Tutors LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Tutor Profile</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('admin.tutor.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
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
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname"
                                                                placeholder="First name">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-user"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('fname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-fn" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                                                                placeholder="Last name" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-user"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('lname')
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
                                                        <label>Email</label>
                                                        <div class="input-group mb-2">
                                                            <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="Enter Email" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-envelope"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('email')
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
                                                        <label>Phone Number</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                                placeholder="Enter Phone Number" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-mobile-alt"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-p" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Birthday</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                                                placeholder="Enter Birthday"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="mm/dd/yyyy" data-mask
                                                                >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-calendar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('birthday')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-b" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <div class="input-group mb-2">
                                                            <input type="password" class="form-control password-popover @error('password') is-invalid @enderror"
                                                                id="password" name="password" placeholder="Enter Password"
                                                                title='<strong>Password must contain the following:</strong>' data-html="true" 
                                                                data-toggle="popover" data-trigger="focus" 
                                                                data-content='
                                                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                                    <p id="number" class="invalid">A <b>number</b></p>
                                                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                                '>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-lock"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-op" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <div class="input-group mb-2">
                                                            <input type="password" class="form-control new-password-popover @error('new_password') is-invalid @enderror" name="new_password" id="new_password"
                                                                placeholder="Enter Password"
                                                                title='<strong>Password must contain the following:</strong>' data-html="true" 
                                                                data-toggle="popover" data-trigger="focus" 
                                                                data-content='
                                                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                                    <p id="number" class="invalid">A <b>number</b></p>
                                                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                                '>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-lock"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('new_password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-np" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <div class="input-group mb-2">
                                                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                                                placeholder="Confirm Password">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-lock"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('confirm_password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-cp" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control @error('country') is-invalid @enderror" name="country"
                                                            data-placeholder="Select Country" style="width: 100%;" >

                                                            <option selected>USA</option>
                                                            {{-- <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option> --}}

                                                        </select>
                                                    </div>
                                                    @error('country')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-c" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select class="form-control @error('state') is-invalid @enderror" name="state" data-placeholder="Select State"
                                                            style="width: 100%;" >

                                                            <option>Alabama</option>
                                                            <option>Alaska</option>
                                                            <option>Arizona</option>
                                                            <option>Arkansas</option>
                                                            <option>California</option>
                                                            <option>Colorado</option>
                                                            <option>Connecticut</option>
                                                            <option>Delaware</option>
                                                            <option>Florida</option>
                                                            <option>Georgia</option>
                                                            <option>Hawaii</option>
                                                            <option>Idaho</option>
                                                            <option>Illinois</option>
                                                            <option>Indiana</option>
                                                            <option>Iowa</option>
                                                            <option>Kansas</option>
                                                            <option>Kentucky</option>
                                                            <option>Louisiana</option>
                                                            <option>Maine</option>
                                                            <option>Massachusetts</option>
                                                            <option>Michigan</option>
                                                            <option>Minnesota</option>
                                                            <option>Mississippi</option>
                                                            <option>Missouri</option>
                                                            <option>Montana</option>
                                                            <option>Nebraska</option>
                                                            <option>Nevada</option>
                                                            <option>New Hampshire</option>
                                                            <option>New Jersey</option>
                                                            <option>New Mexico</option>
                                                            <option>New York</option>
                                                            <option>North Carolina</option>
                                                            <option>North Dakota</option>
                                                            <option>Ohio</option>
                                                            <option>Oklahoma</option>
                                                            <option>Oregon</option>
                                                            <option>Pennsylvania</option>
                                                            <option>Rhode Island</option>
                                                            <option>South Carolina</option>
                                                            <option>South Dakota</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Utah</option>
                                                            <option>Vermont</option>
                                                            <option>Virginia</option>
                                                            <option>Washington</option>
                                                            <option>West Virginia</option>

                                                        </select>
                                                    </div>
                                                    @error('state')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-s" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                                                placeholder="City" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-city"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('city')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-cty" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Zipcode</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                                                                placeholder="Enter Zipcode" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-map-marker-alt"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('zipcode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-zc" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Choose Subjects</label>
                                                        <div class="form-group">
                                                            <select class="select2 @error('subject') is-invalid @enderror" name="subject" multiple="multiple"
                                                                data-placeholder="Select a Subject"
                                                                style="width: 100%;">
                                                                <option>English</option>
                                                                <option>Science</option>
                                                                <option>History</option>
                                                                <option>Mathematics</option>
                                                                <option>Geography</option>
                                                                <option>Economics</option>
                                                                <option>Computer Science</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('subject')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-sb" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            {{-- <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Summary</label>
                                                        <textarea class="form-control @error('summary') is-invalid @enderror" rows="3"
                                                            placeholder="Enter ..." name="summary" ></textarea>
                                                    </div>
                                                    @error('summary')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-sm" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>How would you like to teach?</label>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="teaching_method" value="online">
                                                                <label class="form-check-label">Online</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="teaching_method" value="in-person" >
                                                                <label class="form-check-label">In-Person</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="teaching_method" value="both" checked>
                                                                <label class="form-check-label ">Both</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Select a price per hour that you want to be
                                                            paid</label>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control @error('price_per_hour') is-invalid @enderror" name="price_per_hour"
                                                                placeholder="Enter Price Per Hour" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-dollar-sign"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('price_per_hour')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-pph" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div> --}}


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
                                    <!-- /.card-body -->
                                    {{-- <div class="card-footer text-left">
                                          <button id="create" class="btn btn-primary">
                                              <i class="fas fa-check"></i>
                                              Create
                                          </button>
                                    </div> --}}
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
<!-- Bootstrap 4 -->
{{-- <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
<!-- Select2 -->
<script src="{{ asset('theme_asset/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('theme_asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('theme_asset/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('theme_asset/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('theme_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        console.log( $('.select2').select2() );

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        // // Timepicker
        // $('#timepicker').datetimepicker({
        //     format: 'LT'
        // })

        // //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox()

        // //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        // //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        // $('.my-colorpicker2').on('colorpickerChange', function (event) {
        //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        // });

        // $("input[data-bootstrap-switch]").each(function () {
        //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
        // });

    });





    
    //------------------------------------------------------------------------------
    //                My Script
    //------------------------------------------------------------------------------


    jQuery(document).ready(function(){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

        //-----------------------------------------------------------------------
        //         password popover
        //-----------------------------------------------------------------------
        jQuery('.password-popover').popover({
            trigger: 'focus'
        });
        // jQuery('.new-password-popover').popover({
        //     trigger: 'focus'
        // }); 
        //-----------------------------------------------------------------------
        //        End password popover
        //-----------------------------------------------------------------------
        //
        //-----    Preview Image
        //
        //
        jQuery("#upload_image").change(function() {
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    jQuery('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        jQuery(document).on('click', '#image', function(event) {
            event.preventDefault();
            jQuery('#upload_image').trigger('click')
        })



        // Start password format validation
        //----------------------------------------------------------
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var myInput = document.getElementById("password")

        // Password Bool
        var uper = false;
        var lower = false;
        var num = false;
        var len = false;
        // Other Bool

        // var email_flag = false;
        var pass_flag = false;
        // var username_flag = false;

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            // document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            // document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
                lower = true;
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
                lower = false;
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
                uper = true;
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
                uper = false
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
                num = true;
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
                num = false;
            }

            // Validate length
            if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
                len = true;
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
                len = false;
            }
        }
        //----------------------------------------------------------
        // End password foramt validation
        //----------------------------------------------------------


        //-------------------------------------------------------------------------------------------
        //              Validation and AJAX Calling
        //-------------------------------------------------------------------------------------------
        // jQuery(document).ready(function(){

            // $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
        jQuery(document).on('click', "#update434", function(event){
            event.preventDefault();

            console.log("Button Pressed.");
            var id = jQuery("input[name=id]").val();
            var fname = jQuery("input[name=fname]").val();
            var lname = jQuery("input[name=lname]").val();
            var email = jQuery("input[name=email]").val();
            var phone = jQuery("input[name=phone]").val();
            var birthday = jQuery("input[name=birthday]").val();
            var old_password = jQuery("input[name=old_password]").val();
            var new_password = jQuery("input[name=new_password]").val();
            var confirm_password = jQuery("input[name=confirm_password]").val();
            var country = jQuery("select[name=country] option:selected").val();
            var state = jQuery("select[name=state] option:selected").val();
            var city = jQuery("input[name=city]").val();
            var zipcode = jQuery("input[name=zipcode]").val();

            // var subject = jQuery("select[name=subject] option:selected").val();
            // var subject = jQuery("select[name=subject] option:selected");
            var subject = jQuery("select[name=subject]").val();

            
            var summary = jQuery("textarea[name=summary]").val();
            var price_per_hour = jQuery("input[name=price_per_hour]").val();
            var teaching_method = jQuery("input[name=teaching_method]:checked").val();

            // console.log("ID: ", id);
            // console.log("First Name: ", fname);
            // console.log("Last Name: ", lname);
            // console.log("Email: ", email);
            // console.log("Phone: ", phone);
            // console.log("birthday: ", birthday);
            // console.log("old_password: ", old_password);
            // console.log("new_password: ", new_password);
            // console.log("confirm_password: ", confirm_password);
            // console.log("country: ", country);
            // console.log("state: ", state);
            // console.log("city: ", city);
            // console.log("zipcode: ", zipcode);
            console.log(subject.length);
            // console.log("subject: ", subject);

            // console.log("summary: ", summary);
            // console.log("Price Pr Hour: ", price_per_hour);
            // console.log("Teaching Method: ", teaching_method);
            
            var is_id = false;
            var is_fname = false;
            var is_lname = false;
            var is_email = false;
            var is_phone = false;
            var is_birthday = false;
            var is_old_password = false;
            var is_new_password = false;
            var is_confirm_password = false;
            var is_country = false;
            var is_state = false;
            var is_city = false;
            var is_zipcode = false;

            var is_subject = false;
            var is_summary = false;
            var is_price_per_hour = false;
            var is_teaching_method = false;


            // console.log(fname);
            if (!id )
            {
                // Error
                is_id = false;
                // jQuery('.error-fn').css("display","block");
                // jQuery('.error-fn').html("First name field is required.");
                console.log("ID Missing.");
            }
            else
            {
                // Success
                is_id = true;
                // jQuery('.error-fn').css("display","none");
            }
            if (!fname )
            {
                // Error
                is_fname = false;
                jQuery('.error-fn').css("display","block");
                jQuery('.error-fn').html("First name field is required.");
            }
            else
            {
                // Success
                is_fname = true;
                jQuery('.error-fn').css("display","none");
            }
            if (!lname)
            {
                // Error
                is_lname = false;
                jQuery('.error-ln').css("display","block");
                jQuery('.error-ln').html("Last name field is required.");
            }
            else
            {
                // Success
                is_lname = true;
                jQuery('.error-ln').css("display","none");
            }
            if (!email)
            {
                // Error
                is_email = false;
                jQuery('.error-em').css("display","block");
                jQuery('.error-em').html("Email field is requried.");
            }
            else
            {
                // Success
                is_email = true;
                jQuery('.error-em').css("display","none");
            }
            if (!phone)
            {
                // Error
                is_phone = false;
                jQuery('.error-p').css("display","block");
                jQuery('.error-p').html("Phone field is requried.");
            }
            else
            {
                // Success
                is_phone = true;
                jQuery('.error-p').css("display","none");
            }
            if (!birthday)
            {
                // Error
                is_birthday = false;
                jQuery('.error-b').css("display","block");
                jQuery('.error-b').html("Birthday field is requried.");
            }
            else
            {
                // Success
                is_birthday = true;
                jQuery('.error-b').css("display","none");
            }
            if (!old_password)
            {
                // Error
                is_old_password = false;
                // jQuery('.error-p').css("display","block");
                // jQuery('.error-p').html("Password field is requried.");
            }
            else
            {
                // Success
                is_old_password = true;
                jQuery('.error-p').css("display","none");
            }
            if (!new_password)
            {
                // Error
                is_new_password = false;
                // jQuery('.error-np').css("display","block");
                // jQuery('.error-np').html("Password field is requried.");
            }
            else
            {
                // Success
                is_new_password = true;
                jQuery('.error-np').css("display","none");
            }
            if (!confirm_password)
            {
                // Error
                is_confirm_password = false;
                // jQuery('.error-cp').css("display","block");
                // jQuery('.error-cp').html("Password field is requried.");
            }
            else
            {
                // Success
                is_confirm_password = true;
                jQuery('.error-cp').css("display","none");
            }
            if (!country)
            {
                // Error
                is_country = false;
                jQuery('.error-c').css("display","block");
                jQuery('.error-c').html("Country field is requried.");
            }
            else
            {
                // Success
                is_country = true;
                jQuery('.error-c').css("display","none");
            }
            if (!state)
            {
                // Error
                is_state = false;
                jQuery('.error-s').css("display","block");
                jQuery('.error-s').html("State field is requried.");
            }
            else
            {
                // Success
                is_state = true;
                jQuery('.error-s').css("display","none");
            }
            if (!city)
            {
                // Error
                is_city = false;
                jQuery('.error-cty').css("display","block");
                jQuery('.error-cty').html("City field is requried.");
            }
            else
            {
                // Success
                is_city = true;
                jQuery('.error-cty').css("display","none");
            }
            if (!zipcode)
            {
                // Error
                is_zipcode = false;
                jQuery('.error-zc').css("display","block");
                jQuery('.error-zc').html("Zipcode field is requried.");
            }
            else
            {
                // Success
                is_zipcode = true;
                jQuery('.error-zc').css("display","none");
            }

            if (subject.length < 1)
            {
                // Error
                is_subject = false;
                jQuery('.error-sb').css("display","block");
                jQuery('.error-sb').html("Subject field is requried.");
            }
            else
            {
                // Success
                is_subject = true;
                jQuery('.error-sb').css("display","none");
            }
            if (!summary)
            {
                // Error
                is_summary = false;
                jQuery('.error-sm').css("display","block");
                jQuery('.error-sm').html("Summary field is requried.");
            }
            else
            {
                // Success
                is_summary = true;
                jQuery('.error-sm').css("display","none");
            }
            if (!price_per_hour)
            {
                // Error
                is_price_per_hour = false;
                jQuery('.error-pph').css("display","block");
                jQuery('.error-pph').html("Price per hour field is requried.");
            }
            else
            {
                // Success
                is_price_per_hour = true;
                jQuery('.error-pph').css("display","none");
            }
            if (!teaching_method)
            {
                // Error
                is_teaching_method = false;
                // jQuery('.error-zc').css("display","block");
                // jQuery('.error-zc').html("Zipcode field is requried.");
            }
            else
            {
                // Success
                is_teaching_method = true;
                // jQuery('.error-zc').css("display","none");
            }


            if( (is_id== true) && (is_fname== true) && (is_lname== true) && (is_email== true) && 
                (is_phone== true) && (is_birthday== true) && (is_country== true) && (is_state== true) && 
                (is_zipcode== true ) && (is_subject == true) && (is_summary == true) &&
                (is_price_per_hour == true) && (is_teaching_method) )
            {
                // IF user want to udpate his/her password
                if ( (is_old_password == true) || (is_new_password == true) || (is_old_password == true) )
                {
                    //------------------------------------------------------------------------
                    // User want to update his/her password
                    //------------------------------------------------------------------------
                    if ( is_old_password == true )
                    {
                        // Success
                        if (is_new_password == true)
                        {
                            // Success: Old and New Password Found
                            jQuery(".error-op").css("display", "none");
                            jQuery(".error-np").css("display", "none");
                            if ( new_password == confirm_password )
                            {
                                // Success: New Password and Confirm Password Match 
                                jQuery(".profile-error").css("display", "none");
                                console.log("Calling Function to upadate password" ); 
                                PasswordProfile(id, fname, lname, email, phone, birthday, country,state, city, zipcode, subject, summary, price_per_hour, teaching_method, old_password, new_password, confirm_password);
                            
                            }
                            else
                            {
                                // Error
                                jQuery(".error-op").css("display", "block");
                                jQuery('.error-op').html("New and Confirm Password Does not Match.");
                            }
                        }
                        else
                        {
                            // Error: New password is missing
                            jQuery('.error-np').css("display","block");
                            jQuery('.error-np').html("Password field is requried.");
                        }
                    }
                    else
                    {
                        // Error: Old password is missing
                        jQuery('.error-p').css("display","block");
                        jQuery('.error-p').html("Password field is requried.");
                    }
                }
                else
                {
                    //------------------------------------------------------------------------
                    // User does not want to update his/her password
                    //------------------------------------------------------------------------
                    jQuery(".profile-error").css("display", "none");
                    console.log ("Function Calling !!! Update profile without password.");
                    UpdateProfile(id, fname, lname, email, phone, birthday, country,state, city, zipcode, subject, summary, price_per_hour, teaching_method );
                    
                }
            }
            else
            {
                console.log('These are required fields.');
                jQuery(".profile-error").css("display", "block");
                jQuery(".profile-success").css("display", "none");
                // jQuery(".alert-danger").text('Error! These are required fields.');
            }
        });

    });

    // ----------------------------------------------------------------
    // Update Profile with password
    // ----------------------------------------------------------------
    function PasswordProfile ( id, fname, lname, email, phone, birthday, country,state, city, zipcode, subject, summary, price_per_hour, teaching_method, old_password, new_password, confirm_password )
    {
        console.log ("Ajax Calling !!! Update profile with password.");
        jQuery.ajax({
            url: "{{ url('/tutor/update') }}",
            type: "POST",
            data: { 
                    'id':id, 'fname':fname, 'lname':lname, 'email':email, 'phone':phone,
                    'birthday':birthday, 'country':country, 'state':state, 'city':city, 
                    'zipcode':zipcode, 'subject': subject, 'summary':summary,
                    'price_per_hour':price_per_hour, 'teaching_method':teaching_method,
                    'old_password':old_password, 'new_password':new_password, 'confirm_password':confirm_password
                    },
            success: function(response)
            {
                if ( (response.success == null || response.success == undefined) )
                {
                    console.log("Error Message");
                    jQuery(".profile-success").css("display", "none");
                    jQuery(".error-op").css("display", "block");
                    jQuery('.error-op').html(response.error);
                }
                else  
                {
                    console.log("Success Message");
                    jQuery(".profile-error").css("display", "none");
                    jQuery('.error-op').css("display","none");
                    jQuery(".profile-success").css("display", "block");
                    jQuery('.profile-success').html(response.success);

                    // jQuery("#error_creditional").empty();
                    // jQuery('#login_success').html(response.success);
                    
                    // location.href = "{{ url('/student/edit') }}"						
                }
            }
        });
    }

    // ----------------------------------------------------------------
    // Update Profile without udating password
    // ----------------------------------------------------------------
    function UpdateProfile ( id, fname, lname, email, phone, birthday, country,state, city, zipcode, subject, summary, price_per_hour, teaching_method )
    {
        console.log ("Ajax Calling !!! Update profile without password updating.");
        // console.log(id);
        // console.log(fname);
        // console.log( lname);
        // console.log( email);
        // console.log( phone);
        // console.log( birthday);
        // console.log( country);
        // console.log(state);
        // console.log( city);
        // console.log( zipcode);
        // console.log( "Subject: "+ subject.lenght); // missing
        // console.log("Summary : "+ summary); // missing
        // console.log( price_per_hour);
        // console.log( teaching_method);
        
        jQuery.ajax({
            url: "{{ url('/tutor/update') }}",
            type: "POST",
            data: {
                    'id':id, 'fname':fname, 'lname':lname, 'email':email, 'phone':phone,
                    'birthday':birthday, 'country':country, 'state':state, 'city':city, 
                    'zipcode':zipcode, 'subject': subject, 'summary':summary,
                    'price_per_hour':price_per_hour, 'teaching_method':teaching_method
                    },
            success: function(response)
            {
                if ( (response.success == null || response.success == undefined) )
                {
                    console.log("Error Message");
                    jQuery(".profile-error").css("display", "block");
                    jQuery(".profile-success").css("display", "none");
                    // jQuery("#login_success").empty();
                    // jQuery('.alert-danger').html(response.error);
                }
                else  
                {
                    console.log("Success Message");
                    jQuery(".profile-error").css("display", "none");
                    jQuery(".profile-success").css("display", "block");

                    // jQuery("#error_creditional").empty();
                    jQuery('.profile-success').html(response.success);
                    
                    // location.href = "{{ url('/student/edit') }}"						
                }
            }
        });
    }



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