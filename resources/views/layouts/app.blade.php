<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo&family=Open+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap">
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/selectize-bootstrap-4-style-master/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/selectize-bootstrap-4-style-master/dist/css/selectize.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @yield('page-css')
    <style>

        .topnav {
            overflow: hidden;
            background-color: #fff;
            /*box-shadow: 5px 10px 10px grey;*/
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        .topnav a {
            float: right;
            display: block;
            color: #0B0000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-family: sans-serif;
            font-weight: bold;
            font-size: 15px;
            margin-top: 10%;
        }

        .topnav a:hover {
            color: #E79800;
            text-decoration: none;
        }

        .topnav p:hover {
            text-decoration: underline;
        }

        .topnav p.LogoHere {
            color: #E79800;
            float: left;
            font-size: 32px;
            font-family: Calibri;
            font-weight: bold;
            margin: 1%;
        }

        a.name{
            font-size: 3em;
            padding: 18px 32px;
        }

        @media screen and (max-width: 720px) {
            .UmedLogo{
                width: 32%;
                margin-left: 2%;
                margin-bottom: 1%;
                margin-top: 5%;
            }

        }

        @media screen and (min-width: 720px) {
            .UmedLogo{
                width: 12%;
                margin-left: 5%;
                margin-bottom: 1%;
                margin-top: 1%;
            }

        }

    </style>
</head>
<body>

<div class="topnav" id="myTopnav">
    {{--    <p class="LogoHere">Umed</p>--}}
    <div class="UmedLogo" style="float: left">
        <img src="{{ asset('/Images/UmedLogo.JPG') }}" alt="logo"/>
    </div>

    <div class="linksDashboard" style="float: right" title="Click here to Logout">
        <a class="logOut" href="{{ route('logout') }}">
            <i class="fa fa-sign-out fa-4x" aria-hidden="true"></i>
        </a>

        <a class="name" style="color: #E79800" href="/Dashboard" title="Go back to Dashboard">
            Dashboard
        </a>
    </div>

    </a>
</div>


@yield('content')
@yield('selectize-script')


<script src="https://cdn.tailwindcss.com"></script>
<script src="https://www.jquery-az.com/jquery/js/jquery-treeview/logger.js"></script>
<script src="https://www.jquery-az.com/jquery/js/jquery-treeview/treeview.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

</body>
</html>
