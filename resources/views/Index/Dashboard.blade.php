@extends('layouts.app')

@section('content')

@section('page-css')

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

    <style>

        .center-div
        {
            margin: 5% auto;
            max-width: 700px;
            height: auto;
            background-color: #FFFFFF;
            border-radius: 30px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
            rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
            rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        a.new {
            margin-top: 10%;
            margin-bottom: 0.5%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #2DCFAA;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */
        }

        a.newafter {
            margin-top: 10%;
            margin-bottom: 0.5%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #2DCFAA;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */
            pointer-events: none; /* Disables mouse clicks and hover events */
            text-decoration: none; /* Removes underline */
            cursor: not-allowed; /* Change the cursor style */
        }

        a.new1{
            margin-top: 0.5%;
            margin-bottom: 0.5%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #2DCFAA;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */

        }
        a.newBefore1{
            margin-top: 0.5%;
            margin-bottom: 0.5%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #D2042D;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */
            pointer-events: none; /* Disables mouse clicks and hover events */
            text-decoration: none; /* Removes underline */
            cursor: not-allowed; /* Change the cursor style */
        }

        .new2{
            margin-top: 0.5%;
            margin-bottom: 10%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #2DCFAA;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */
        }

        .newBefore2{
            margin-top: 0.5%;
            margin-bottom: 10%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 18px 32px;
            background-color: #D2042D;
            width: 80%;
            border-radius: 30px;
            color: white;
            font-family: "Lato", sans-serif;
            font-size: 2em;
            font-weight: bolder;
            text-align: center; /* Center the text horizontally */
            text-decoration: none; /* Remove underlines from the anchor link */
            display: inline-block; /* Make the link a block element to apply padding and width */
            pointer-events: none; /* Disables mouse clicks and hover events */
            text-decoration: none; /* Removes underline */
            cursor: not-allowed; /* Change the cursor style */
        }

        .new:hover{
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }.new1:hover{
             text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
         }.new2:hover{
              text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
          }

        .dashboard{
            font-size: 2.5em;
            padding-top: 10%;
            text-align: center;
            font-family: "Lato", sans-serif;
            color: #7A7A7A;
            letter-spacing: 2px;
        }

        .applicantName{
            font-size: 1.5em;
            padding-top: 1.5%;
            text-align: center;
            font-family: "Lato", sans-serif;
            color: #7A7A7A;
            letter-spacing: 2px;
        }
    </style>

@stop


<div class="center-div">
    <div class="dashboard">
        DASHBOARD
        <br>
    </div>
    <div class="applicantName">
        <p>{{$FullName}}</p>
    </div>
    @if( $Statusid <= 4)
        <a class="new" href="/Index" >Fill Application Form</a>
    @else
        <a class="newafter" href="" >Form Submitted Successfully</a>
    @endif

    @if( $Statusid <= 4)
        <a class="newBefore1" href="/ViewApplicationForm">View Application Form</a>
    @else
        <a class="new1" href="/ViewApplicationForm">View Application Form</a>
    @endif

    @if( $Statusid <= 4)
        <a class="newBefore2" href="/generatePDF">Download Application Form</a>
    @else
        <a class="new2" href="/generatePDF">Download Application Form</a>
    @endif
</div>
</div>


@endsection

@section('selectize-script')

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
        $(document).ready(function () {
            debugger;
            document.body.style.zoom = "75%";
        });
    </script>


@endsection
