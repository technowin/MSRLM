<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up</title>
    <title>Please SignUp Here</title>
    <link href="{{ asset('css/userSignup.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
<section class="container">
    <header>Registration Form</header>

    <div class="form">

        <div class="input-box required">
            <label>Full Name ( Firstname Middlename Surname)</label>
            <input type="text" placeholder="Enter full name" id="fullName" oninput="RestrictWhiteSpace(this);" required />
        </div>

        <div class="input-box required">
            <label>Email Address</label>
            <input oninput="handleInputEmail(event)" placeholder="Enter Email Address" type="email" id="emailId">
            <div class="icons">
                <i class='bx bxs-check-circle check' ></i>
                <i class='bx bxs-x-circle x' ></i>
            </div>
        </div>

        <div class="input-box required">
            <label>Phone Number</label>
            <input oninput="handleInput(event)" placeholder="Enter phone number"  id="phoneNumber">
            <div class="icons">
                <i class='bx bxs-check-circle check' ></i>
                <i class='bx bxs-x-circle x' ></i>
            </div>
        </div>

        {{--        <div class="input-box required ">--}}
        {{--            <label>Phone Number</label>--}}
        {{--            <input placeholder="Enter phone number" name="phoneNumber" id="phoneNumber" oninput="MobileNumberOnly(this)"  maxlength="10" required />--}}
        {{--        </div>--}}

        <div class="input-box addres required">
            <label>Address</label>
            <input type="text" placeholder="Enter address ( City Name )" name="address" id="address" maxlength="50" oninput="RestrictWhiteSpace(this);" required />
        </div>

        <button id="submitButtonForSignUp" onclick="OTPSender()" type="button">Submit</button>

        <div>
            <div class="fp">
                {{--                                <a href="@Url.Action("Index", "Index")">Go To Login</a>--}}
            </div>
            <div class="SI">
                <span>Click Here To</span>
                <a href="{{ URL::to('/LogIn') }}" >SignIn</a>
            </div>
        </div>
    </div>

</section>

<link rel="stylesheet" href="/Content/selectize-bootstrap-4-style-master/dist/js/selectize/standalone/selectize.min.js">
<link href="{{ asset('Scripts/selectize.min.js') }}" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    function handleInputEmail(evt) {
        const value = evt.target.value
        const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

        if (emailRegex.test(value.trim())) {
            evt.target.classList.add('valid');
            evt.target.classList.remove('invalid');
            // Show the submit button
            document.getElementById('submitButtonForSignUp').style.display = 'block';
        } else {
            evt.target.classList.add('invalid');
            evt.target.classList.remove('valid');
            // Hide the submit button
            document.getElementById('submitButtonForSignUp').style.display = 'none';
        }

        if (!value) {
            evt.target.classList.remove('invalid')
            document.querySelector('#submitButtonForSignUp').disabled = false;
        }
    }
</script>
<script>
    function handleInput(evt) {
        const value = evt.target.value
        // const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
        var emailRegexnew = /^\d{10}$/;

        if (emailRegexnew.test(value.trim())) {
            evt.target.classList.add('valid');
            evt.target.classList.remove('invalid');
// Show the submit button
            document.getElementById('submitButtonForSignUp').style.display = 'block';
        } else {
            evt.target.classList.add('invalid');
            evt.target.classList.remove('valid');
// Hide the submit button
            document.getElementById('submitButtonForSignUp').style.display = 'none';
        }

        if (!value) {
            evt.target.classList.remove('invalid')
            document.querySelector('#submitButtonForSignUp').disabled = false;
        }
    }

    // const email = document.getElementById("email");
    // debugger;
    // email.addEventListener('input', () => {
    //     debugger;
    //     const emailBox = document.querySelector('.emailBox');
    //     const emailText = document.querySelector('.emailText');
    //     const emailPattern = /[A-Za-z0-9._%+-]+@@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;
    //
    //     if (email.value.match(emailPattern)) {
    //         emailBox.classList.add('valid');
    //         emailBox.classList.remove('invalid');
    //         emailText.innerHTML = "Your Email Address is Valid";
    //     } else {
    //         emailBox.classList.add('invalid');
    //         emailBox.classList.remove('valid');
    //         emailText.innerHTML = "Must be a valid email address.";
    //     }
    // });

</script>

<script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    $("#CheckIfAvailable").click(function (input) {

        debugger;

        var emailId = input;

        if( emailId != null && emailId != "" ) {

            var fd = new FormData();
            // Append data
            fd.append('emailId', emailId);
            fd.append('_token', CSRF_TOKEN);

            $.ajax({
                url: "{{route('CheckUserIdAvailable')}}",
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',

                success: function (data) {
                    debugger;
                    if (data.status == "1") {

                        $('#checkId').val(1);
                        document.querySelector('#submitButtonForSignUp').disabled = false;
                    } else {
                        alert("EmailId Already Exists!!! Please Login");
                        $('#checkId').val(0);
                        document.getElementById('submitButtonForSignUp').style.visibility = 'hidden';
                        window.location.href = '/Account/UserSignUp';
                    }
                }
            });
        }else{
            alert("Fill Email");
            return false;
        }
    });
</script>

{{--<script>--}}

{{--    $('#phoneNumber').click(function () {--}}
{{--        debugger;--}}
{{--        var emailId = $("#email").val();--}}

{{--        $.ajax({--}}
{{--            url: "{{URL::to('/toCheckEmail')}}/" + emailId ,--}}
{{--            type: 'GET',--}}
{{--            datatype: "json",--}}
{{--            traditional: true,--}}

{{--            success: function (data) {--}}
{{--                debugger;--}}

{{--                if (data == '1') {--}}

{{--                    swal({--}}
{{--                        title: 'EmailId Already Exists!!!',--}}
{{--                        text: 'Please Login',--}}
{{--                        icon: 'error',--}}
{{--                        timer: 3000,--}}
{{--                        buttons: false,--}}
{{--                    })--}}
{{--                        .then(() => {--}}
{{--                            document.getElementById('submitButtonForSignUp').style.visibility = 'hidden';--}}
{{--                            window.location.href = '/LogIn';--}}
{{--                        })--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    })--}}

{{--</script>--}}

<script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    function OTPSender() {
        debugger;

        var FullName = $("#fullName").val();
        var emailId = $("#emailId").val();
        var phoneNumber = $("#phoneNumber").val();
        var address = $("#address").val();

        if (FullName != '' && FullName != null && emailId != '' && emailId != null &&
            phoneNumber != '' && phoneNumber != null &&
            address != '' && address != null) {

            var fd = new FormData();
            // Append data
            fd.append('FullName', FullName);
            fd.append('emailId', emailId);
            fd.append('phoneNumber', phoneNumber);
            fd.append('address', address);
            fd.append('_token', CSRF_TOKEN);

            $.ajax({
                url: "{{route('PostUserSignUp')}}",
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',

                success: function (data) {
                    debugger;
                    var Status = data.Status;
                    var emailId = data.emailId;
                    var phoneNumber = data.phoneNumber;
                    var FullNameNew = data.FullName;
                    // var MiddleName = data.MiddleName;
                    // var LastName = data.LastName;

                    if (Status == '1') {

                        swal({
                            title: 'Registered Successfully',
                            text: 'Redirecting To OTP Screen',
                            icon: 'success',
                            timer: 2000,
                            buttons: false,
                        })
                            .then(() => {
                                window.location.href = '/OTPScreen/' + emailId + '/' + phoneNumber + '/' + FullNameNew;
                            })
                    } else {
                        swal({
                            title: 'User Already Registered',
                            text: 'Please LogIn',
                            icon: 'error',
                            timer: 3000,
                            buttons: false,
                        })
                            .then(() => {
                                window.location.href = '/LogIn';
                            })
                    }
                }
            });
        }else{
            alert('Please fill the required fields')
            return false;
        }
    }
</script>

<script>
    function RestrictWhiteSpace(input) {
        if (/^\s/.test(input.value))
            input.value = '';
    }

    function MobileNumberOnly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "");
    }
</script>


{{--<script>--}}
{{--    const email = document.getElementById("email");--}}
{{--    debugger;--}}
{{--    email.addEventListener('input', () => {--}}
{{--        const emailBox = document.querySelector('.emailBox');--}}
{{--        const emailText = document.querySelector('.emailText');--}}
{{--        const emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';--}}

{{--        if (email.value.match(emailPattern)) {--}}
{{--            emailBox.classList.add('valid');--}}
{{--            emailBox.classList.remove('invalid');--}}
{{--            emailText.innerHTML = "Your Email Address is Valid";--}}
{{--        } else {--}}
{{--            emailBox.classList.add('invalid');--}}
{{--            emailBox.classList.remove('valid');--}}
{{--            emailText.innerHTML = "Must be a valid email address.";--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}



</body>
</html>
