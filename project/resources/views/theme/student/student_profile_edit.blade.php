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

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('theme_asset/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>


                                    <a href="#" class="btn btn-primary btn-block"><strong>Update Profile
                                            Pic</strong></a>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


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
                                            <form role="form" method="POST" 
                                            action="{{ Route('student.update.profile') }}"   accept-charset="UTF-8" enctype="multipart/form-data" >
                                              @csrf


                                                <div class="row">
                                                    <div class="col-sm-12">
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
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <div class="input-group mb-2">
                                                                <input type="text" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                                                    placeholder="Enter Old Password" value="{{ $user->password }}">
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
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <div class="input-group mb-2">
                                                                <input type="text" class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                                                    placeholder="Enter Password">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <div class="input-group mb-2">
                                                                <input type="text" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"
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




        //-------------------------------------------------------------------------------------------
        //              Update
        //-------------------------------------------------------------------------------------------
        jQuery(document).ready(function(){

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

            jQuery("#update333").click(function(event){
                event.preventDefault();

                console.log("Button Pressed.");
                // var user = jQuery("#user").val();
                var user = jQuery("input[name=fname]").val();
                var user = jQuery("input[name=lname]").val();
                var user = jQuery("input[name=email]").val();


                var pass = jQuery("#password").val();
                
                // var remember = jQuery("#remember").val();
                // console.log("CheckMark : "+ remember);
                // var type = jQuery("#type").val();

                var error = false;

                if(user != '' && pass != '')
                {
                    // error = false;
                    console.log ("Ajax Calling !!!");
                    jQuery.ajax({
                        url: "{{ url('home') }}",
                        type: "POST",
                        data: {'user':user, 'password':pass, 'remember':remember},
                        success: function(response)
                        {
                            if ( (response.success == null || response.success == undefined) )
                            {
                                console.log("Error Message");
                                jQuery(".alert-danger").css("display", "block");
                                jQuery("#login_success").empty();
                                jQuery('.alert-danger').html(response.error);
                            }
                            else  
                            {
                                console.log("Success Message");
                                jQuery(".alert-danger").css("display", "none");
                                jQuery("#error_creditional").empty();
                                jQuery('#login_success').html(response.success);
                                
                                location.href = "{{ url('/dashboard') }}"						
                            }
                        }
                    });
                }
                else
                {
                    console.log('These are required fields.');
                    jQuery(".alert-danger").css("display", "block");
                    jQuery(".alert-danger").text('Error! These are required fields.');
                    // error = true;
                }
            
            });
        });





    </script>
</body>

</html>
