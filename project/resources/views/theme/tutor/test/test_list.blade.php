
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<style>

    .error-message
    {
        display: none;
        margin-top: 5px;
    }
</style>


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
                        <h1 class="m-0 text-dark">All Tests</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">All Tests</li>
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

                    {{-- Certification --}}
                    <div class="col-md-12 ju-result-m-bottom" >
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Add Certification</button>
                    </div>

                    <div class="col-md-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Tests</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">

                                                @if ( (count($tests) > 0) )
                                                    @foreach ($tests as $test)
                                                        @if ( (count($test->questions) > 0) )
                                                            <p>
                                                                {{-- <div class="my-rating-7 d-inline" data-rating="{{ $test->star_rating }}"></div> --}}
                                                                {{-- </br> --}}
                                                                <b>{{ $test->name }}</b>
                                                                <a href="{{ url('tutor/attempt-test') }}/{{ $test->id }}" class="btn btn-primary float-right" >Attempt</a>
                                                                </br>
                                                                {{ $test->description }} 
                                                                </br>
                                                                <hr>
                                                                {{-- <span class="text-muted text-sm">
                                                                    <em>Allison, 13 lessons with Nicole </em>
                                                                </span> --}}
                                                            </p>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    The tutor has no test.
                                                @endif
                                        </div>
                                    </div>
                                    <!-- input states -->
                                </form>
                            </div>
                            <!-- /.card-body -->
                            {{-- <hr> --}}
                            {{-- <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div> --}}
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



        <!-- Modal -->
        {{-- Upload File Document or Certification --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf

                        <div clas="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-sm-12" for="institute">Institute Name</label>
                                    <input type="text" class="form-control" name="institute" placeholder="Institute Name" >
                                    <div class="col-sm-12 error-message alert alert-danger error-ins" role="alert">
                                        Error Message Goes Here
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div clas="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-sm-12" for="certification">Certification Title</label>
                                    <input type="text" class="form-control" name="certification" placeholder="Certification Title" >
                                    <div class="col-sm-12 error-message alert alert-danger error-crt" role="alert">
                                        Error Message Goes Here
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label col-sm-12" for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" placeholder="mm/dd/yyyy" >
                                <div class="col-sm-12 error-message alert alert-danger error-st" role="alert">
                                    Error Message Goes Here
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label col-sm-12" for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" placeholder="mm/dd/yyyy" >
                                <div class="col-sm-12 error-message alert alert-danger error-end" role="alert">
                                    Error Message Goes Here
                                </div>
                            </div>
                        </div>

                        {{-- <div clas="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-sm-12" for="institute">Upload Certification File</label>
                                    <input type="text" class="form-control" name="institute" placeholder="Institute Name" >
                                    <div class="col-sm-12 error-message alert alert-danger error-ins" role="alert">
                                        Error Message Goes Here
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <label class="control-label col-sm-12" for="institute">Upload Certification File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-upload"/>
                                        <label name="file_name" class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="save" >Save</button>
                </div>
            </div>
            </div>
        </div>

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

    jQuery('#file-upload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#file-upload')[0].files[0].name;
        jQuery('label[name="file_name"]').text(file);
        // alert(file);
    });



    jQuery(document).ready(function(){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
        
        jQuery(document).on('click','button[name="save"]',function(event){
            event.preventDefault();

            console.log("Button Pressed.");

            let institute = jQuery('input[name="institute"]').val();
            let certification = jQuery('input[name="certification"]').val();
            let start_date = jQuery('input[name="start_date"]').val();
            let end_date = jQuery('input[name="end_date"]').val();
            let file_name = jQuery('label[name="file_name"]').text();

            // console.log(file_name);

            // Defining Bool Variable
            let is_institute = false;
            let is_certification = false;
            let is_start_date = false;
            let is_end_date = false;

            if (!institute)
            {
                // Error
                is_institute = false;
                jQuery('.error-ins').css("display","block");
                jQuery('.error-ins').html("Institute field is required.");
            }
            else
            {
                // Success
                is_institute = true;
                jQuery('.error-ins').css("display","none");
            }

            if (!certification)
            {
                // Error
                is_certification = false;
                jQuery('.error-crt').css("display","block");
                jQuery('.error-crt').html("Certification field is required.");
            }
            else
            {
                // Success
                is_certification = true;
                jQuery('.error-crt').css("display","none");
            }

            if (!start_date)
            {
                // Error
                is_start_date = false;
                jQuery('.error-st').css("display","block");
                jQuery('.error-st').html("Start date field is required.");
            }
            else
            {
                // Success
                is_start_date = true;
                jQuery('.error-st').css("display","none");
            }
            if (!end_date)
            {
                // Error
                is_end_date = false;
                jQuery('.error-end').css("display","block");
                jQuery('.error-end').html("End date field is required.");
            }
            else
            {
                // Success
                is_end_date = true;
                jQuery('.error-end').css("display","none");
            }
            if( (is_institute==true ) && (is_certification==true ) && (is_start_date==true ) && (is_end_date==true ) )
            {
               EducationData(institute, certification, start_date, end_date)
            }
            else
            {
                //Error: Some field are missing data.
            }

        });
    });

    // Store Education data into table
    function EducationData(institute, certification, start_date, end_date)
    {
        console.log("Calling AJAX !!! Add Certification !!!");
        jQuery.ajax({
            url: "{{ url('tutor/add-education') }}",
            type: "POST",
            data: {'institute':institute, 'certification':certification, 'start_date':start_date, 'end_date':end_date},
            success: function(data)
            {
                if ( (data.success == null || data.success == undefined) )
                {
                    console.log("Error Message");
                }
                else
                {
                    console.log("Success Message");
                    window.location = "{{ route('tutor.profile') }}"
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
    header("Location: ".url('/signin'));exit;
}
?>