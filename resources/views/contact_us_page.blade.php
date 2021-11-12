<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <link rel="icon" type="image/png" href="{{env('PUBLIC_PATH')}}images/icons/favicon.ico"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
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
        
                    <form method="POST" action="{{env('APP_URL')}}/contact_us_submit" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="contect-us-contact-form-title">
                            Contact Us
                        </span>
        
                        <div class="wrap-input validate-input {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input class="input" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
        
                        <div class="wrap-input validate-input {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input class="input" type="text" name="email" placeholder="Email"  value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
        
                        <div class="wrap-input validate-input {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <input class="input phone" type="text" name="phone_number" placeholder="Phone number"  value="{{ old('phone_number') }}">
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        </div>
        
                        <div class="wrap-input validate-input {{ $errors->has('category') ? 'has-error' : '' }}">
                            <input class="input" list="category" name="category" placeholder="Category"  value="{{ old('category') }}">
                            <datalist id="category">
                                <option value="Student">Student</option>
                                <option value="Work">Work</option>
                                <option value="Others ">Others </option>
                            </datalist>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
        
                        <div class="container-contect-us-contact-form-btn">
                            <button type="submit" class="contect-us-contact-form-btn">
                                <span>
                                    Submit
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </span>
                            </button>
                           
                        </div>
                        <div class="container-contect-us-msg">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        </script>

    </body>
</html>
