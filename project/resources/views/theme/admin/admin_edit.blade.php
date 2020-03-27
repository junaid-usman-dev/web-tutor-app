<?php
    if (!empty(session()->get('session_admin_id')) )
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


<style>

    .error-message
    {
        display: none;
    }

</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Header Section --}}
        @include('theme.admin.inc.header')
        {{-- End Header Section --}}

        {{-- Side Bar Menu --}}
        @include('theme.admin.inc.sidebar')
        {{-- End Side Bar Menu --}}


        <!-- Content Wrapper. Contains page content -->
        
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
        <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Manage Tutors</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">Manage Tutors</li>
                                <li class="breadcrumb-item active">Edit Admin</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card card-primary card-outline" style="width: 60%; margin: 0px auto; margin-top: 10%;">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Edit Admin</p>

                    {{-- action="{{ action('Users\Admin\AdminController@update') }}" --}}
                    <form  method="POST" accept-charset="UTF-8" >
                          @csrf
                        

                          <div class="alert error-message alert-success alert-dismissible fade show profile-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Success!</strong> Your profile information has been updated.
                        </div>
                        
                        <div class="input-group mb-2">
                            <input type="hidden" name="id" class="form-control" autocomplete="disabled" value="{{ $admin->id }}"/>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-0 ml-0">
                                <div class="input-group mb-2">
                                    <input type="text" name="fname" class="form-control" autocomplete="disabled" value="{{ $admin->first_name }}" >
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
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
                            <div class="col-6 mb-0 ml-0">
                                <div class="input-group mb-2">
                                    <input type="text" name="lname" class="form-control" autocomplete="disabled" value="{{ $admin->last_name }}" >
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
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
    
                        <div class="input-group mb-2">
                            <input type="email" name="email" class="form-control" autocomplete="disabled" value="{{ $admin->email_address }}" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="error-message alert alert-danger error-em" role="alert">
                            Error Message Goes Here
                        </div>
                        
                        <div class="input-group mb-2">
                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('old_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="error-message alert alert-danger error-op" role="alert">
                            Error Message Goes Here
                        </div>

                        <div class="input-group mb-2">
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('new_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="error-message alert alert-danger error-np" role="alert">
                            Error Message Goes Here
                        </div>

                        <div class="input-group mb-2">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="error-message alert alert-danger error-cp" role="alert">
                            Error Message Goes Here
                        </div>
                        
                        <div class="social-auth-links text-center">
                            <button class="btn btn-block btn-primary" name="update" id="update" >
                                <em class="fas fa-check-circle mr-2"></em>
                                Edit
                            </button>
                        </div>
    
                    </form>
    
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->

            <!-- /.content-header -->
        </div>
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
        

    </script>

    <script>
        
        // jQuery(document).ready(function(){
        //     $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
        
        
        jQuery(document).on('click', "#update", function(event){
            event.preventDefault();

            console.log("Button Calling.");
            var id = jQuery("input[name=id]").val();
            var fname = jQuery("input[name=fname]").val();
            var lname = jQuery("input[name=lname]").val();
            var email = jQuery("input[name=email]").val();
            var old_password = jQuery("input[name=old_password]").val();
            var new_password = jQuery("input[name=new_password]").val();
            var confirm_password = jQuery("input[name=confirm_password]").val();
            
            console.log("ID: ", id);
            console.log("First Name: ", fname);
            console.log("Last Name: ", lname);
            console.log("Email: ", email);
            
            console.log("old_password: ", old_password);
            console.log("new_password: ", new_password);
            console.log("confirm_password: ", confirm_password);
            

            var is_id = false;
            var is_fname = false;
            var is_lname = false;
            var is_email = false;
            var is_old_password = false;
            var is_new_password = false;
            var is_confirm_password = false;
            
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
                jQuery('.error-op').css("display","none");
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

            if( (is_id== true) && (is_fname== true) && (is_lname== true) && (is_email== true) )
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
                                PasswordProfile(id, fname, lname, email, old_password, new_password, confirm_password);
                            
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
                    UpdateProfile(id, fname, lname, email );
                    
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

        // ----------------------------------------------------------------
        // Update Profile with password
        // ----------------------------------------------------------------
        function PasswordProfile(id, fname, lname, email, old_password, new_password, confirm_password)
        {
            console.log ("Ajax Calling !!! Update profile with password.");
            jQuery.ajax({
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "{{ url('/admin/update') }}",
                type: "POST",
                data: { 
                    "_token": "{{ csrf_token() }}",'id':id, 'fname':fname, 'lname':lname, 'email':email,
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
        function UpdateProfile(id, fname, lname, email )
        {
            console.log ("Ajax Calling !!! Update profile without password updating.");
        
            jQuery.ajax({
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "{{ url('/admin/update') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}", 'id':id, 'fname':fname, 'lname':lname, 'email':email
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
    }
    else
    {
		// Go to welcome page
        header("Location: ".url('/admin/signin'));exit;
    }
?>