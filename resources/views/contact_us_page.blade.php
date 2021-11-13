<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{env('APP_NAME')}}</title>

        <link rel="icon" type="image/png" href="{{env('PUBLIC_PATH')}}images/icons/favicon.ico"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="{{env('PUBLIC_PATH')}}css/main.css" rel="stylesheet">
        <link href="{{env('PUBLIC_PATH')}}css/util.css" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Admin Login</a>
                    @endauth
                </div>
            @endif
            <div class="contect-us-contact">
                <div class="container-contect-us-contact">
                    <div class="contect-us-contact-pic js-tilt" data-tilt>
                        <img src="{{env('PUBLIC_PATH')}}images/img-01.png" alt="IMG">
                    </div>
        
                    {{-- <form method="POST" action="{{env('APP_URL')}}/contact_us_submit" > --}}
                    <form id="contact_form_id" class="contact_form" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="contect-us-contact-form-title">
                            Contact Us
                        </span>
        
                        <div class="wrap-input1 validate-input" data-validate = "Name is required">
                            <input class="input" type="text" name="name" placeholder="Name">
                            <span class="shadow-input1"></span>
                        </div>
        
                        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input" type="text" name="email"  placeholder="Email" >
                            <span class="shadow-input1"></span>
                        </div>
        
                        <div class="wrap-input1 validate-input" data-validate = "Phone number is invalid">
                            <input class="input phone" type="text" name="phone_number" placeholder="Phone number" >
                            <span class="shadow-input1"></span>
                        </div>
        
                        <div class="wrap-input1 validate-input">
                            <input class="input" list="category" name="category" placeholder="Category" value="Student">
                            <datalist id="category">
                                <option value="Student">Student</option>
                                <option value="Work">Work</option>
                                <option value="Others ">Others </option>
                            </datalist>
                            <span class="shadow-input1"></span>
                        </div>
        
                        <div class="container-contect-us-contact-form-btn">
                            <button type="button" class="contect-us-contact-form-btn" id="submit-btn">
                                <span>
                                    Submit
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </span>
                            </button>
                           
                        </div>
                        {{-- <div class="container-contect-us-msg">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        {{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}

        <script>
            
            // onkeypress on digite validation

            $('body').on('keypress','.phone', function(event){
                return isNumber(event, this)
            });
            function isNumber(evt, element) {
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if ( (charCode >= 48 && charCode <= 57) || (charCode == 32) || (charCode == 43)|| (charCode == 40) || (charCode == 41))
                    return true;
                return false;
            }

            // check mail validation
            function checkEmailValidation(email)
            {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(data).val()))
                {
                    return (true);
                }
                alert("You have entered an invalid email address!");
                return (false);
            }

            (function ($) {
                "use strict";

                /*==================================================================
                [ Validate ]*/
                var name = $('.validate-input input[name="name"]');
                var email = $('.validate-input input[name="email"]');
                var phone_number = $('.validate-input input[name="phone_number"]');
                var category = $('.validate-input textarea[name="category"]');

                $('#submit-btn').on('click',function(){
                    // alert('hy');
                    var check = true;

                    if($(name).val() == ''){
                        showValidate(name);
                        check=false;
                    }

                    if($(phone_number).val().match(/^[6-9][0-9]{9}$/) == null) {
                        showValidate(phone_number);
                        check=false;
                    }

                    if($(email).val().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null) {
                        showValidate(email);
                        check=false;
                    }

                    if($(category).val() == ''){
                        showValidate(category);
                        check=false;
                    }

                    if(check == true)
                    {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var url = "{{env('APP_URL')}}/contact_us_submit";
                        var contactFormData = $('#contact_form_id').serialize();

                        $.ajax({
                            url: url,
                            data: contactFormData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function (dataofconfirm) {
                                $('input[type="text"]').each(function() {
                                    $(this).val('');
                                });
                                alert(dataofconfirm);
                            }
                        })

                    }
                    return check;
                });

                $('.contact_form .input').each(function(){
                    $(this).focus(function(){
                        hideValidate(this);
                    });
                });

                function showValidate(input) {
                    var thisAlert = $(input).parent();
                    $(thisAlert).addClass('alert-validate');
                }

                function hideValidate(input) {
                    var thisAlert = $(input).parent();
                    $(thisAlert).removeClass('alert-validate');
                }
            })(jQuery);
        </script>

    </body>
</html>
