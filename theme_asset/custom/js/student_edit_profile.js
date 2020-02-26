



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
            // var user = jQuery("#user").val();
            var fname = jQuery("input[name=fname]").val();
            var lname = jQuery("input[name=lname]").val();
            var email = jQuery("input[name=email]").val();
            var phone = jQuery("input[name=phone]").val();
            var birthday = jQuery("input[name=birthday]").val();
            var password = jQuery("input[name=old_password]").val();
            var new_password = jQuery("input[name=new_password]").val();
            var confirm_password = jQuery("input[name=confirm_password]").val();
            var country = jQuery("select[name=country] option:selected").val();
            var state = jQuery("select[name=state] option:selected").val();
            var city = jQuery("select[name=city] option:selected").val();
            var zipcode = jQuery("input[name=zipcode]").val();

            var is_fname = false;
            var is_lname = false;
            var is_email = false;
            var is_phone = false;
            var is_birthday = false;
            var is_password = false;
            var is_new_password = false;
            var is_confirm_password = false;
            var is_country = false;
            var is_state = false;
            var is_city = false;
            var is_zipcode = false;

            // console.log(fname);
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
            // if (!password)
            // {
            //     // Error
            //     jQuery('.error-p').css("display","block");
            //     jQuery('.error-p').html("Password field is requried.");
            // }
            // if (!new_password)
            // {
            //     // Error
            //     jQuery('.error-np').css("display","block");
            //     jQuery('.error-np').html("Password field is requried.");
            // }
            // if (!confirm_password)
            // {
            //     // Error
            //     jQuery('.error-cp').css("display","block");
            //     jQuery('.error-cp').html("Password field is requried.");
            // }
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
            
            // var pass = jQuery("#password").val();

            if( (is_fname== true) && (is_lname== true) && (is_email== true) && (is_phone== true)
                 && (is_birthday== true) && (is_country== true) && (is_state== true) && (is_zipcode== true) )
            {
                jQuery(".profile-error").css("display", "none");
                console.log ("Ajax Calling !!!");
                jQuery.ajax({
                    url: "{{ url('/student/update') }}",
                    type: "POST",
                    data: { 'fname':fname, 'lname':lname, 'email':email, 'phone':phone, 'birthday':birthday, 'country':country, 'state':state, 'city':city, 'zipcode':zipcode },
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
                jQuery(".profile-error").css("display", "block");
                // jQuery(".alert-danger").text('Error! These are required fields.');
            }
        
        });
    });
    //-------------------------------------------------------------------------------------------
    //             End Validation and AJAX Calling
    //-------------------------------------------------------------------------------------------

});


  