
<?php
if ( empty(session()->get('session_tutor_id')) && empty(session()->get('session_student_id')) )
{

?>


<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TutorLynx | Sign up</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('theme_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dist/css/adminlte.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('theme_asset/custom/css/custom.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('theme_asset/custom/css/header.css') }}" rel="stylesheet">
    {{-- <script src="https://kit.fontawesome.com/ac9913b312.js" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('theme_asset/custom/css/footer.css') }}" rel="stylesheet">


</head>

<style>
.alert-danger
{
    display: none;
}
</style>

{{-- class="hold-transition register-page" --}}
<body >


    @include('inc.header')

    {{-- <div style="width:100%; height:100%; background-color: #e5e5e5; padding-top:5%; padding-bottom:8%;" class="register-page" > --}}
    <div class="ju-header register-page" > 
        
        <div class="register-box " style="margin: 0px auto;" >
            <div class="register-logo">
                {{-- <a href="{{ url('/') }}"><img src="{{ asset('theme_asset/dist/img/TLLogo.png') }}" style="width: 60px">
                    <img src="{{ asset('theme_asset/dist/img/TL_txt_img.png') }}"></a> --}}
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Login for TutorLynx</p>
                    {{-- action="{{ action('Registration\RegistrationController@home') }}" method="POST" --}}
                    <form >
                        @csrf

                        <div class="input-group mb-2 alert alert-danger" role="alert">
                            Errors Goes Here.
                        </div>

                        <div class="input-group mb-2">
                            <input type="text" name="user" id="user" class="form-control" placeholder="Email" value={{ old('user') }} >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value={{ old('Password') }} >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember" >
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button id="login" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>

                    <p class="mb-1">
                        <a href="{{ url('confirm-email-address') }}">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ url('signup') }}" class="text-center">Register a new membership</a>
                    </p>

                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.register-box -->
    </div>

        @include('inc.footer');

        <!-- jQuery -->
        <script src="{{ asset('theme_asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('theme_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('theme_asset/dist/js/adminlte.min.js') }}"></script>
</body>

</html>


<script>

jQuery(document).ready(function(){
        
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
        
    // jQuery("#login").click(function(event){
    jQuery(document).on('click','#login', function(event){
        event.preventDefault();
        
        console.log("Button Pressed.");
        var user = jQuery("#user").val();
        var pass = jQuery("#password").val();
        if ($('#remember').is(":checked"))
        {
            // it is checked
            var remember = true;

            // console.log("CheckMark condition : "+ remember);
        }
        // var remember = jQuery("#remember").val();
        // console.log("CheckMark : "+ remember);
        // var type = jQuery("#type").val();

        var error = false;

        if(user != '' && pass != '')
        {
            // error = false;
            console.log ("Ajax Calling !!!");
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('home') }}",
                type: "POST",
                data: { "_token": "{{ csrf_token() }}", 'user':user, 'password':pass, 'remember':remember},

                beforeSend: function(){
                    $('#login').attr("disabled", true);
                    console.log("Request");
                },
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
                },
                complete: function(){
                    $("#login").attr("disabled", false);
                    console.log("Response");
                    // $('#login').hide();
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


<?php 
}
else
{
    if ( !empty(session()->get('session_tutor_id')) )
    {
        header("Location: ".url('/tutor'));exit;
    }
    else if ( !empty(session()->get('session_student_id')) )
    {
        header("Location: ".url('/student'));exit;
    }
    else
    {
        echo ("test");
        // console.log("dfdfdfd");
        // header("Location: ".url('/student'));exit;
    }
    // Go to welcome page
}
?>