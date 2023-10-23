<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up</title>
    <title>Please SignUp Here</title>
    <link href="{{ asset('css/OTPScreen.css') }}" rel="stylesheet">

</head>

<body>

<section class="container">
    <header>OTP Screen</header>
    <div class="form">
        <label class="emailBox input-box">
            <label>Enter the code sent on your emailID to register yourself!! Thank you.</label>
            <input type="text" id="mailOtp" placeholder="Enter OTP Here"
                   onclick="restrictWhiteSpace(this)", oninput="MobileNumberOnly(this)" maxlength="6" >
        </label>

        <div style="display: none" id="emailIdToPost">
            {{$emailIdToPost}}
        </div>

        <div style="display: none" id="phoneNumberToPost">
            {{$phoneNumber}}
        </div>

        <div style="display: none" id="FirstNameToPost">
            {{$FullNameNew}}
        </div>

{{--        <div style="display: none" id="MiddleNameToPost">--}}
{{--            {{$MiddleName}}--}}
{{--        </div>--}}

{{--        <div style="display: none" id="LastNameToPost">--}}
{{--            {{$LastName}}--}}
{{--        </div>--}}


        <button id="btnSubmit" type="button">Submit</button>

        <div>
            {{--            <div class="fp">--}}
            {{--                <a href="{{ URL::to('/LogIn') }}" >SignIn</a>--}}
            {{--            </div>--}}
            <div class="SI">
                <span>Click Here To</span>
                <a href="{{ URL::to('/UserSignUp') }}" >SignUp</a>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    function restrictWhiteSpace(e) {
        debugger;
        $("input").on("keypress", function(e) {
            if (e.which === 32 && !this.value.length)
                e.preventDefault();
        });
    }

    function MobileNumberOnly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "");
    }
</script>

<script>

    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    $("#btnSubmit").click(function () {
        debugger;
        var otp = $("#mailOtp").val();

        var element = document.getElementById('emailIdToPost');
        var value = element.innerText;
        var emailId = value.trim();

        var element = document.getElementById('phoneNumberToPost');
        var value = element.innerText;
        var phoneNumber = value.trim();

        var element = document.getElementById('FirstNameToPost');
        var value = element.innerText;
        var FullNameNew = value.trim();

        // var element = document.getElementById('MiddleNameToPost');
        // var value = element.innerText;
        // var MiddleName = value.trim();
        //
        // var element = document.getElementById('LastNameToPost');
        // var value = element.innerText;
        // var LastName = value.trim();


        if( otp != null && otp != '' ){

            var fd = new FormData();
            // Append data
            fd.append('otp', otp);
            fd.append('emailId', emailId);
            fd.append('phoneNumber', phoneNumber);
            fd.append('FullName', FullNameNew);
            // fd.append('MiddleName', MiddleName);
            // fd.append('LastName', LastName);
            fd.append('_token', CSRF_TOKEN);

            $.ajax({
                url: "{{route('PostOTPScreenEmail')}}",
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',

                success: function (data) {
                    debugger;

                    var emailId = data.emailId;
                    var status = data.status;

                    if (status == '1') {

                        swal({
                            title: 'Registered Successfull!!!',
                            text: 'Redirecting To Index',
                            icon: 'success',
                            timer: 3000,
                            buttons: false,
                        })
                            .then(() => {
                                window.location.href = '/Dashboard';
                            })
                    }else{

                        swal({
                            title: 'Please Enter OTP Again',
                            text: 'OTP Is Invalid!!!',
                            icon: 'error',
                            timer: 3000,
                            buttons: false,
                        })

                    }
                }
            });
        }else {

            swal({
                title: 'Please Fill The Required Fields',
                text: 'Please Enter OTP!!!',
                icon: 'error',
                timer: 3000,
                buttons: false,
            })

        }
    })

</script>

</body>
</html>
