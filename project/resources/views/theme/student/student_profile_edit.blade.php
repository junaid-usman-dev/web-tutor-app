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
/* .error-fn{
    display: none;
} */
.error-message{
    display: none;
}
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('theme.student.inc.header')
        <!-- End navbar -->

        <!-- Main Sidebar Container -->
        @include('theme.student.inc.sidebar')
        <!-- End Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Student Profile Edit</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Student Profile Edit</li>
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
                            <form role="form" method="POST" action="{{ route('student.update.image') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                                @csrf
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <input type="file" id="upload_image" name="upload_image" class="d-none">
                                            <img id="image" class="profile-user-img img-fluid img-circle" style="cursor:pointer;"
                                                src="{{ url('/') }}/{{ $user->images->path }}/{{ $user->images->name }}" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
                                        <input type="submit" class="btn btn-primary btn-block" value="Update Profile Pic">
                                        {{-- <a href="#" class="btn btn-primary btn-block"><strong>Update Profile
                                                Pic</strong></a> --}}
                                    </div>
                                    <!-- /.card-body -->
                                </div>
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
                                            <h3 class="card-title">Edit Your Profile</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form role="form"
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
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <div class="input-group mb-2">
                                                                <input type="text" name="fname" class="form-control  @error('fname') is-invalid @enderror"
                                                                    placeholder="First name" value="{{ $user->first_name }}" >
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
                                                                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                                                                    placeholder="Last name" value="{{ $user->last_name }}" >
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
                                                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Enter Email" value="{{ $user->email_address }}">
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
                                                                    placeholder="Enter Phone Number" value="{{ $user->phone }}">
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
                                                                    placeholder="Enter Birthday" value="{{ $user->birthday }}"
                                                                    data-inputmask-alias="datetime"
                                                                    data-inputmask-inputformat="mm/dd/yyyy" data-mask>
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
                                                            <label>Old Password</label>
                                                            <div class="input-group mb-2">
                                                                <input type="password" class="form-control password-popover22 @error('old_password') is-invalid @enderror" id="old_password" name="old_password"
                                                                    placeholder="Enter Old Password" 
                                                                    {{-- title='<strong>Password must contain the following:</strong>' data-html="true" 
                                                                    data-toggle="popover" data-trigger="focus" 
                                                                    data-content='
                                                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                                        <p id="number" class="invalid">A <b>number</b></p>
                                                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                                    ' --}}
                                                                    >                                                                  
                                                                    
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-lock"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('old_password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="error-message alert alert-danger error-op" role="alert">
                                                            Error Message Goes Here
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <div class="input-group mb-2">
                                                                <input type="password" class="form-control new-password-popover @error('new_password') is-invalid @enderror" id="new_password" name="new_password"
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
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Country</label>


                                                            <select class="form-control @error('country') is-invalid @enderror" name="country"
                                                                data-placeholder="Select Country" style="width: 100%; " value="{{ $user->country }}">

                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option>Washington</option>
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
                                                            <select class="form-control @error('state') is-invalid @enderror" name="state" data-placeholder="Select State" style="width: 100%;" value="{{ $user->State }}">

                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option>Washington</option>
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
                                                            <select class="form-control @error('city') is-invalid @enderror" name="city" data-placeholder="Select City" style="width: 100%;" value="{{ $user->city }}">

                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option>Washington</option>
                                                            </select>
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
                                                                <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror"
                                                                    placeholder="Enter Zipcode" value="{{ $user->zipcode }}">
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
                                        {{-- <!-- /.card-body -->
                                        <div class="card-footer text-left">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-check"></i>
                                                 Update
                                            </button>
                                        </div>
                                        <!-- /.card-footer --> --}}
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
        @include('theme.student.inc.footer')

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
    <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })



//------------------------------------------------------------------------------
//                My Script
//------------------------------------------------------------------------------


        jQuery(document).ready(function(){

        //-----------------------------------------------------------------------
        //         password popover
        //-----------------------------------------------------------------------

        jQuery('.password-popover').popover({
            trigger: 'focus'
        });
        jQuery('.new-password-popover').popover({
            trigger: 'focus'
        }); 
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
            jQuery('#upload_image').trigger('click')
        })


        // Start password format validation
        //----------------------------------------------------------
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var myInput = document.getElementById("new_password")

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
        jQuery(document).ready(function(){

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

            jQuery("#update").click(function(event){
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
                var city = jQuery("select[name=city] option:selected").val();
                var zipcode = jQuery("input[name=zipcode]").val();
                
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


                if( (is_id== true) && (is_fname== true) && (is_lname== true) && (is_email== true) && 
                    (is_phone== true) && (is_birthday== true) && (is_country== true) && (is_state== true) && 
                    (is_zipcode== true) )
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
                                    console.log ("Ajax Calling !!! Update profile with password.");
                                    jQuery.ajax({
                                        url: "{{ url('/student/update') }}",
                                        type: "POST",
                                        data: { 'id':id, 'fname':fname, 'lname':lname, 'email':email, 'phone':phone, 'birthday':birthday, 'old_password':old_password, 'new_password':new_password,'confirm_password':confirm_password, 'country':country, 'state':state, 'city':city, 'zipcode':zipcode },
                                        success: function(response)
                                        {
                                            if ( (response.success == null || response.success == undefined) )
                                            {
                                                console.log("Error Message");
                                                // jQuery(".profile-error").css("display", "block");
                                                jQuery(".profile-success").css("display", "none");
                                                jQuery(".error-op").css("display", "block");
                                                // jQuery(".error-np").empty();
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
                        console.log ("Ajax Calling !!! Update profile without password.");
                        jQuery.ajax({
                            url: "{{ url('/student/update') }}",
                            type: "POST",
                            data: { 'id':id, 'fname':fname, 'lname':lname, 'email':email, 'phone':phone, 'birthday':birthday, 'country':country, 'state':state, 'city':city, 'zipcode':zipcode },
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
                                    // jQuery('#login_success').html(response.success);
                                    
                                    // location.href = "{{ url('/student/edit') }}"						
                                }
                            }
                        });
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
        //-------------------------------------------------------------------------------------------
        //             End Validation and AJAX Calling
        //-------------------------------------------------------------------------------------------

        });


    </script>
</body>

</html>
