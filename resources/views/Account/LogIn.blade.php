<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LogIn Here</title>
    <link href="{{ asset('css/logIn.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
<section class="container">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <img style="height: 20%; width: 20%" src="{{asset('images/MSRLM-Logo.jpeg')}}">
    <header > Login Form</header></div>
    <div class="form">
{{--        <label class="emailBox input-box">--}}
{{--            <input type="email" id="email" name="email" placeholder="Enter Email Address">--}}
{{--        </label>--}}

        <div class="input-box required">
{{--            <label>Email Address</label>--}}
            <input oninput="handleInput(event)" placeholder="Enter Email Address" name="email" type="email" id="email">
            <div class="icons">
                <i class='bx bxs-check-circle check' ></i>
                <i class='bx bxs-x-circle x' ></i>
            </div>
        </div>

        <button id="btnSubmit" type="button">Submit</button>

        <div>
            <div class="fp">
{{--                <a href="{{ route('Index.Index') }}">Fill Form</a>--}}
            </div>
            <div class="SI">
                <span>Click Here To</span>
                <a href="{{ URL::to('/UserSignUp') }}" >SignUp</a>
            </div>
        </div>
    </div>
</section>


<link href="{{ asset('Scripts/selectize.min.js') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    function handleInput(evt) {
        const value = evt.target.value
        const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

        if (emailRegex.test(value.trim())) {
            evt.target.classList.add('valid');
            evt.target.classList.remove('invalid');
            // Show the submit button
            document.getElementById('btnSubmit').style.display = 'block';
        } else {
            evt.target.classList.add('invalid');
            evt.target.classList.remove('valid');
            // Hide the submit button
            document.getElementById('btnSubmit').style.display = 'none';
        }

        if (!value) {
            evt.target.classList.remove('invalid')
            document.querySelector('#submitButtonForSignUp').disabled = false;
        }
    }
</script>

<script>
    function RestrictWhiteSpace(input) {
        if (/^\s/.test(input.value))
            input.value = '';
    }
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");


    $("#btnSubmit").click(function () {
        debugger;
        var emailId = $("#email").val()

        if( emailId != null && emailId != "" ){

            var fd = new FormData();
            // Append data
            fd.append('emailId', emailId);
            fd.append('_token', CSRF_TOKEN);

            $.ajax({
                url: "{{route('PostUserLogIn')}}",
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',

                success: function (data) {
                    debugger;

                    var emailId = data.emailId;
                    var Status = data.Status;

                    if (Status == '1') {

                        swal({
                            title: 'Redirecting To OTP Screen',
                            text: 'Please Wait...',
                            icon: 'success',
                            timer: 2000,
                            buttons: false,
                        })
                            .then(() => {
                                window.location.href = '/OTPScreenForLogIn/' +emailId;
                            })
                    }else{
                        swal({
                            title: 'Login Failed ',
                            text: 'Please Fill The Registration Form First',
                            icon: 'error',
                            timer: 3000,
                            buttons: false,
                        })
                            .then(() => {
                                window.location.href = '/UserSignUp' ;
                            })
                    }
                }
            });
        }else{
            swal({
                title: 'Please Fill The Required Fields',
                text: 'Please Enter EmailId!!!',
                icon: 'error',
                timer: 3000,
                buttons: false,
            })
        }
    })

</script>

</body>
</html>

