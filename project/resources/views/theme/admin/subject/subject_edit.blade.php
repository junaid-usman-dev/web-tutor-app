
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
                        <h1 class="m-0 text-dark">Edit Subject</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Subject</li>
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
                                        <h3 class="card-title">Edit Subject</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        {{-- method="POST" action="{{ route('admin.subject.update') }}" --}}
                                        <form role="form" accept-charset="UTF-8" enctype="multipart/form-data" >
                                            @csrf

                                            {{-- Frontend Error --}}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                      {{-- Error --}}
                                                      <div class="alert error-message alert-danger alert-dismissible fade show subject-error" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          <strong>Error!</strong> Something went wronge, Please try later.
                                                      </div>
                                                      {{-- End Error --}}
                                                      {{-- Success --}}
                                                      <div class="alert error-message alert-success alert-dismissible fade show subject-success" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          <strong>Success!</strong> Your subject data has been updated.
                                                      </div>
                                                      {{-- End Success --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <input name="id" type="hidden" class="form-control" value="{{ $subject->id }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Subject Name</label>
                                                        <div class="input-group mb-2">
                                                            <input name="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                                                placeholder="Enter Subject" value="{{ $subject->name }}" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-envelope"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('subject')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-sb" role="alert">
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
                                                                placeholder="Enter Description" value="{{ $subject->description }}" >
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
                                                    <div class="error-message alert alert-danger error-d" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row d-none ">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control @error('category') is-invalid @enderror" name="category"
                                                                data-placeholder="Select Category" style="width: 100%;" >
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                        @if ($subject->category_id == $category->id )
                                                                            selected
                                                                        @endif
                                                                    >{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('category')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="error-message alert alert-danger error-c" role="alert">
                                                        Error Message Goes Here
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer text-left">
                                                <button id="update" class="btn btn-primary">
                                                    <i class="fas fa-check"></i>
                                                    Update
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
<!-- Bootstrap 4 -->
{{-- <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
<!-- Select2 -->
{{-- <script src="{{ asset('theme_asset/plugins/select2/js/select2.full.min.js') }}"></script> --}}
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

        jQuery(document).on('click', "#update", function(event){
            event.preventDefault();
            console.log("Button Click.");

            var id = jQuery("input[name=id]").val();
            var subject = jQuery("input[name=subject]").val();
            var description = jQuery("input[name=description]").val();
            var category = jQuery("select[name=category] option:selected").val();

            // console.log("ID: "+id);
            // console.log("Subject: "+subject);
            // console.log("Description: "+description);
            // console.log("Category: "+category);
            // console.log("ID: "+id);

            var is_id = false;
            var is_subject = false;
            var is_description = false;
            var is_category = false;

            if (!id)
            {
                // Error
                is_id = false;
                jQuery('.subject-error').css("display","block");
                // jQuery('.id-error').html("First name field is required.");
            }
            else
            {
                // Success
                is_id = true;
                jQuery('.subject-error').css("display","none");
            }
            if (!subject)
            {
                // Error
                is_subject = false;
                jQuery('.error-sb').css("display","block");
                jQuery('.error-sb').html("Subject field is required.");
            }
            else
            {
                // Success
                is_subject = true;
                jQuery('.error-sb').css("display","none");

            }
            if (!description)
            {
                // Error
                is_description = false;
                jQuery('.error-d').css("display","block");
                jQuery('.error-d').html("Description field is required.");
            }
            else
            {
                // Success
                is_description = true;
                jQuery('.error-d').css("display","none");
            }
            if (!category)
            {
                // Error
                is_category = false;
                jQuery('.error-c').css("display","block");
                jQuery('.error-c').html("Category field is required.");
            }
            else
            {
                // Success
                is_category = true;
                jQuery('.error-c').css("display","none");
            }

            if ( (is_id==true) && (is_subject==true) && (is_description==true) && (is_category==true) )
            {
                UpdateSubject (id, subject, description, category)
            }
            else
            {
                // Error: Some Field are missing data.
            }

        });
    });

    // Ajax Calling Function
    function UpdateSubject (id, subject, description, category)
    {
        console.log ("Ajax Calling !!! Update Subject");
        jQuery.ajax({
            url: "{{ route('admin.subject.update') }}",
            type: "POST",
            data: { 
                    'id':id, 'subject':subject, 'description':description, 'category':category
                    },
            success: function(response)
            {
                if ( (response.success == null || response.success == undefined) )
                {
                    console.log("Error Message");
                    jQuery(".subject-success").css("display", "none");
                    jQuery(".subject-error").css("display", "block"); // Frontend Response
                    // jQuery('.subject-error').html(response.error); // Server Response
                }
                else  
                {
                    console.log("Success Message");
                    jQuery(".subject-error").css("display", "none");
                    jQuery(".subject-success").css("display", "block"); // Frontend Response
                    // jQuery('.subject-success').html(response.success); // Server Response

                    // jQuery("#error_creditional").empty();
                    // jQuery('#login_success').html(response.success);
                    
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