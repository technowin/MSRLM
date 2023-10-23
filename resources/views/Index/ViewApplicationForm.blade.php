@extends('layouts.app')

@section('content')

@section('page-css')

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MSRLM Recruitment 2023</title>

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

        .mwb-form-radio input[type="radio"]:checked + label::after {
            opacity: 1;
            transform: scale(1);
            transition: 0.3s linear all;
            visibility: visible;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            height: 100%
        }

        #heading {
            text-transform: uppercase;
            color: #E79800;
            font-weight: normal;
            text-align: center;
            font-size: 1.6em;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 12px;
            /*letter-spacing: 1px*/
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #E79800;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #E79800;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            color: black;
            background-color: white;
            border: 1px solid #E79800;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .fs-title {
            font-size: 25px;
            color: #E79800;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #E79800;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        .fieldlabelss {
            color: gray;
            text-align: left;
            font-size: 20px;
            margin-bottom:5% ;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #E79800
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f19d"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #E79800
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #E79800
        }

        @media screen and (max-width: 720px) {
            .WholeCard {
                margin: 30% 0%;
            }
            .card {
                z-index: 0;
                border: none;
                position: relative;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                padding: 2%;
                font-size: 1.5em;
            }

            .cardForEducation{
                width: 200%;
                margin-left: -40%;
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 0;
                /*box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;*/
            }
        }

        @media screen and (min-width: 720px) {
            .WholeCard {
                margin:5% 0%;
            }
            .card {
                z-index: 0;
                border: none;
                position: relative;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                padding: 2%;
                font-size: 1.5em;
            }

            .cardForEducation{
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 0;
                /*box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;*/
            }
        }

        label {
            display: block;
            color: #7d7d7d;
        }

        .required label {
            font-weight: bold;
        }

        .required label:after {
            color: #e32;
            content: ' *';
            display: inline;
        }

        body {
            background-color: #f9f9fa;
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .padding {
            padding: 5rem
        }

        .card .card-title {
            color: #000000;
            margin-bottom: 0.625rem;
            font-size: 1.5em;
            font-weight: 500
        }

        p {
            color: grey;
            text-align: center;
            font-size: 1em;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar
        }

        .table,
        .jsgrid .jsgrid-table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent
        }

        .table thead th,
        .jsgrid .jsgrid-table thead th {
            border-top: 0;
            border-bottom-width: 1px;
            font-weight: 500;
            font-size: 1em;
            text-transform: uppercase
        }

        .table td,
        .jsgrid .jsgrid-table td {
            font-size: 0.875rem;
            padding: .475rem 0.4375rem
        }

        .mt-10 {
            padding: 0.875rem 0.3375rem !important
        }

        button {
            outline: 0 !important;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25) !important
        }

        /*.cardForEducation{*/
        /*    position: relative;*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*    min-width: 0;*/
        /*    word-wrap: break-word;*/
        /*    background-color: #fff;*/
        /*    background-clip: border-box;*/
        /*    border: 1px solid #d2d2dc;*/
        /*    border-radius: 0;*/
        /*    !*box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;*!*/
        /*}*/

        .QualificationDropDown{
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 12px;
        }

        .QualificationDropDown option{
            font-size: 1.2em;
        }
    </style>
@stop

@csrf

<div class="container-fluid">
    <div class="col-md-12 row WholeCard">
        <div class="card">
            <h2 id="heading">Application Form For Empanelment Of State Resource Person( SRP )</h2>
            <p>Fill all form field to go to next step</p>
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active" id="account"><strong>Personal</strong></li>
                    <li id="personal"><strong>Education</strong></li>
                    <li id="payment"><strong>profession</strong></li>
                    <li id="payment"><strong>Application</strong></li>
{{--                    <li id="confirm"><strong>Finish</strong></li>--}}
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div> <br> <!-- fieldsets -->

                {{--                Step 1              --}}

                <fieldset id="">
                    <div class="form-card">
                        <div class="row">

                            <div class="col-md-6">
                                <h2 class="fs-title">Personal Information:</h2>
                            </div>
                            <div class="col-md-6">
                                <h2 class="steps">Step 1 - 4</h2>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">FirstName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="FirstName" placeholder="Enter FirstName"
                                           value="{{$FirstName}}" id="FirstName" onkeypress="return AvoidSpace(event)" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">MiddleName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="MiddleName" placeholder="Enter MiddleName"
                                           value="{{$MiddleName}}" id="MiddleName" onkeypress="return AvoidSpace(event)" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">LastName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="LastName" placeholder="Enter LastName"
                                           value="{{$LastName}}" id="LastName" onkeypress="return AvoidSpace(event)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">EmailId: </label></div>
                                <div class="col-md-7">
                                    <input type="email" name="email" placeholder="Enter EmailId"
                                           value="{{$emailId}}" id="email" oninput="restrictWhiteSpace(this)" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Mobile No: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="Mobile" placeholder="Enter MobileNo"
                                           id="Mobile" value="{{$mobileNo}}" oninput="MobileNumberOnly (this)" maxlength="10" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">Category: </label></div>
                                <div class="col-md-7">
                                    <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="categories" disabled readonly="">
                                        <option>Select</option> <!-- Default "Select" option -->


                                        @foreach($CategoryDetails as $item => $item2)
                                            <option value="{{$item2->value}}"
                                                    @if($item2->value == $Category) selected @endif>{{$item2->text}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">DateOfBirth:</label></div>
                                <div class="col-md-7">
                                    <input type="date" value="{{$DateOfBirth}}" placeholder="" id="dateOfBirth" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">Age On 01/06/2023(year, Month &Days)</label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$Age}}" placeholder="" id="calculateAge" onclick="calculateDateOfBirth()" readonly=""/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">Aadhar Card</label></div>

                                <div class="col-md-7">
                                    {{--                                    <input type="number" value="{{$aadharInput}}" placeholder="Enter Addard Card No." id="aadharInput" />--}}
                                    <input type="text" id="aadharInput"  value="{{$aadharInput}}" maxlength="14" oninput="handleInputAadhar(event)" disabled><br>
                                    <span class="AadharNo"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">Pan Card</label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$pancardNo}}" readonly/>
                                </div>
                            </div>



                            <div class="col-md-6 mb-2 row" style="justify-content: center">
                                <div style="" id="imageContainer">
                                    <div class="" id="" style="margin:20px;">
                                        @if( $ProfilePhotoToShow == null || $ProfilePhotoToShow == "" )
                                            <img id="uploadedImage" style="width: 200px; height: 180px; border: solid;"
                                                 src=""/>
                                        @else
                                            <img id="uploadedImage" style="width: 200px; height: 180px; border: solid;"
                                                 src="{{$ProfilePhotoToShow}}"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row" style="justify-content: center">
                                <div style="" id="SignatureContainer">
                                    <div class="" id="" style="margin:20px;">
                                        @if( $ProfileSignatureToShow == null || $ProfileSignatureToShow == "" )
                                            <img id="uploadedSignature" style="width: 200px; height: 180px; border: solid;"
                                                 src=""/>
                                        @else
                                            <img id="uploadedSignature" style="width: 200px; height: 180px; border: solid;"
                                                 src="{{$ProfileSignatureToShow}}"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-5 required">
                                    <label class="fieldlabels">
                                        Domicile Of Maharashtra:
                                    </label>
                                </div>
                                @if($Domicile == 'Yes')
                                    <div class="col-md-6 row ml-2">
                                        <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @elseif($Domicile == 'No')
                                    <div class="col-md-6 row ml-2">
                                        <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled="disabled">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="">
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6 mb-4 row">
                                <div class="col-md-5 required">
                                    <label class="fieldlabels">
                                        Are You From Handicap Category:
                                    </label>
                                </div>
                                @if( $Handicap == 'Yes' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @elseif( $Handicap == 'NO' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;" disabled >
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            @if( $Handicap == 'Yes' )
                                <div class="col-md-6 mb-2 row" style="display: block;" id="HandicapType">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">If Yes, Handicap Type: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" readonly />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2 row" style="display: block;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" readonly />
                                    </div>
                                </div>
                            @elseif( $Handicap == 'NO' )

                                <div class="col-md-6 mb-2 row" style="display: none;" id="HandicapType">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">If Yes, Handicap Type: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" readonly />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2 row" style="display: none;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" readonly />
                                    </div>
                                </div>

                            @else
                                <div class="col-md-6 mb-2 row" style="display: none;" id="HandicapType">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">If Yes, Handicap Type: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" readonly />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2 row" style="display: none;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" readonly  />
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-5 required">
                                    <label class="fieldlabels">
                                        Sex:
                                    </label>
                                </div>
                                @if( $Sex == 'Male' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Female</b></label></div>
                                    </div>
                                @elseif( $Sex == 'Female' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Female</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled="disabled">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Female</b></label></div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">
                                        Married Status:
                                    </label>
                                </div>
                                @if( $MarriedStatus == 'Married' )
                                    <div class="col-md-7 row ml-2">
                                        <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Not Married</b></label></div>
                                    </div>
                                @elseif( $MarriedStatus == 'Not Married' )
                                    <div class="col-md-7 row ml-2">
                                        <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Not Married</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-7 row ml-2">
                                        <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married"
                                               style="height:25px; width:25px; vertical-align: middle;" disabled>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Not Married</b></label></div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="fieldlabelss">Residential Address ( Current Address )</label>
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Building Name: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurBuildingName}}" placeholder="Enter Building Name" id="buildingName" oninput="restrictWhiteSpace(this)" readonly="readonly" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Street Name, Area Locality: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurBuildingName}}" placeholder="Enter Street Name" id="streetName" oninput="restrictWhiteSpace(this)" readonly="readonly"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">City: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurCity}}" placeholder="Enter City" id="city" oninput="restrictWhiteSpace(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">State: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurState}}" placeholder="Enter State" id="state" oninput="restrictWhiteSpace(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">District: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurCity}}" placeholder="Enter District" id="district" oninput="restrictWhiteSpace(this)" readonly  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Landmark: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurLandmark}}" placeholder="Enter Landmark" id="landmark" oninput="restrictWhiteSpace(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">PinCode: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurPincode}}" placeholder="Enter PinCode" id="pincode" maxlength="6" oninput="MobileNumberOnly(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <input type="checkbox" id="SameAs" name="SameAs" value="Boat" style="margin-top:14px;
                                margin-left:50px; height:25px; width:25px; vertical-align: middle; " disabled="disabled">

                                <label for="vehicle3" id="SameAs" style=" margin-left: 10px; font-weight:bold; font-size: 15px;
                                margin-top: 15px; vertical-align: middle;">Same As Current Address</label><br><br>
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6">
                                <label class="fieldlabelss">Permanent Address</label>
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Building Name: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerBuildingName}}" placeholder="Enter Building Name" id="perBuildingName" oninput="restrictWhiteSpace(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Street Name, Area Locality: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerStreetName}}" placeholder="Enter Street Name" id="perStreetName" oninput="restrictWhiteSpace(this)" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">City: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerCity}}" placeholder="Enter City" id="perCity" oninput="restrictWhiteSpace(this)" readonly />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">State: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerState}}" placeholder="Enter State" id="perState" oninput="restrictWhiteSpace(this)" readonly  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">District: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerState}}" placeholder="Enter District" id="perDistrict" oninput="restrictWhiteSpace(this)" readonly  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Landmark: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerLandmark}}" placeholder="Enter Landmark" id="perLandmark" oninput="restrictWhiteSpace(this)" readonly  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">PinCode: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerPincode}}" placeholder="Enter PinCode" id="perPincode" maxlength="6" oninput="MobileNumberOnly(this)" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" id="step1" class="next action-button" value="Next" />
                </fieldset>

                {{--                step 2              --}}

                <fieldset id="">
                    <div class="form-card">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="fs-title">Educational Information:</h2>
                            </div>
                            <div class="col-md-6">
                                <h2 class="steps">Step 2 - 4</h2>
                            </div>
                        </div>

                        {{--                        Education Details Table--}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Educational Details ( From S.S.C Onwards )</h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsEducational" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Qualification</th>
                                                            <th>Stream ( BE IT / Science / Comps )</th>
                                                            <th>College / Institute / University / Board</th>
                                                            <th>Mark %</th>
                                                            <th>Year Of Passing</th>
                                                            <th>Subject / Specialization</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($EducationalDetailsToShow as $item)
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item-> SrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="Qualification[]" class="QualificationDropDown" id="Qualification" disabled readonly>
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($EducationDetails as $item1)
                                                                            <option value="{{$item1->value}}" @if($item1->value == $item->Qualification) selected @endif>{{$item1->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="Stream[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{ $item-> STREAM }}" readonly></td>
                                                                <td><input type="text" name="CollegeName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> CollegeName}}" readonly></td>
                                                                <td><input type="text" name="Percentage[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> Mark}}" readonly></td>
                                                                <td><input type="month" name="year[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> YearOfPassing}}" readonly></td>
                                                                <td><input type="text" name="Subject[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> Subjects}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        Other Table--}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Other professional qualification / Certifications / Computer education details </h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsOther" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Other Certifications</th>
                                                            <th>Board / Organization</th>
                                                            <th>Year Of Passing</th>
                                                            <th>Percentage / Grade</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $professionalDetailsToShow as $item1 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item1-> ProfessionalSrNo}}</td>
                                                                <td><input type="text" name="otherCerti[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{ $item1-> OtherCertification }}" readonly></td>
                                                                <td><input type="text" name="otherOrg[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> BoardOrganization}}" readonly></td>
                                                                <td><input type="month" name="otherYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> YearOfPassing}}" readonly></td>
                                                                <td><input type="text" name="otherPerc[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> Percentage}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="button" name="next" id="step2" class="next action-button" value="Next" />
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>

                {{--                step 3--}}
                <fieldset id="">
                    <div class="form-card">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="fs-title">Professional Details:</h2>
                            </div>
                            <div class="col-md-6">
                                <h2 class="steps">Step 3 - 4</h2>
                            </div>
                        </div>

                        {{--                        Experience Details Table--}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">1. Experience Details ( Chronological Order ) </h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsExperience" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Name Of Organization</th>
                                                            <th>Joining Date</th>
                                                            <th>Leaving Date</th>
                                                            <th>Total Experience</th>
                                                            <th>Position Held</th>
                                                            <th>Role / Nature Of Cuties</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $ExperienceDetailsToShow as $item2 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item2-> ExperienceSrNo}}</td>
                                                                <td><input type="text" name="ExpOrg[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item2-> NameOfOrganization }}" readonly></td>
                                                                <td><input type="date" name="ExpJoining[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> JoiningDate}}" readonly></td>
                                                                <td><input type="date" name="ExpLeaving[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> LeavingDate}}" readonly></td>
                                                                <td><input type="text" name="ExpTotal[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> TotalExperience}}" readonly></td>
                                                                <td><input type="text" name="ExpPosition[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> PositionHeld}}" readonly></td>
                                                                <td><input type="text" name="ExpRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> RoleOfDuties}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center">
{{--                                                    <input type="text" placeholder="Total Experience" class="form-control" readonly>--}}
                                                    <input type="text" id="totalExperience" value="{{$TotalExperienceStepThree}}" placeholder="Total Experience" class="form-control" readonly onclick="calculateTotalExperience()" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                       Workshop & Training Attended --}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">2. Workshop & Trainings Attended </h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsWorkshop" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Name Of The Training Program</th>
                                                            <th>Conducted By ( Orgination Name )</th>
                                                            <th>Duration ( Days )</th>
                                                            <th>Year</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $WorkshopDetailsToShow as $item3 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item3-> WorkshopSrNo}}</td>
                                                                <td><input type="text" name="WorkshopTrainingP[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item3-> NameOfProgram }}" readonly></td>
                                                                <td><input type="text" name="workshopOri[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> ConductedBy}}" readonly></td>
                                                                <td><input type="number" name="workshopDura[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> DuraionDays}}" readonly></td>
                                                                <td><input type="month" name="WorkshopYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> WorkshopYear}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                       Training Conducted --}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">3. Training Conducted as Master Trainer / Resource Person </h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsTrainingConducted" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Training Conducted As</th>
                                                            <th>Training Conducted By ( Origination Name )</th>
                                                            <th>Name Of Training Program</th>
                                                            <th>Subject You Taken</th>
                                                            <th>Duration Of Training Program</th>
                                                            <th>In Which Year Training Conducted</th>
                                                            <th>Number Of Participants Participateed</th>
                                                            <th>Venue Of Training Program</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $TrainingConductedDetailsToShow as $item4 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item4-> TCSrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="TrainingsConductedAS[]" class="QualificationDropDown" id="Qualification" disabled readonly="">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($TrainingConducted as $item1)
                                                                            <option value="{{$item1->value}}" @if($item1->value == $item4->ConductedAsRole) selected @endif>{{$item1->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="TCOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ConductedBy}}" readonly></td>
                                                                <td><input type="text" name="TCTrainingProgram[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> NameOfProgram}}" readonly></td>
                                                                <td><input type="text" name="TCSubject[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> Subjects}}" readonly></td>
                                                                <td><input type="text" name="TCDurationOfTP[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> DurationOfProgram}}" readonly></td>
                                                                <td><input type="month" name="TCYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> TrainingConductedYear}}" readonly></td>
                                                                <td><input type="number" name="TCParticipant[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ParticipantsParticipated}}" readonly></td>
                                                                <td><input type="text" name="TCVenue[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ProgramVenue}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                       Training Module Developed --}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">4. Training Module Developed</h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsTrainingModuleDeveloped" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Name Of Training Module</th>
                                                            <th>Developed For ( Origination Name )</th>
                                                            <th>Your Role In Module Development</th>
                                                            <th>Year</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $TrainingModuleDetailsToShow as $item4 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item4-> TrainingModuleSrNo}}</td>
                                                                <td><input type="text" name="TMName[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item4-> NameOfModule }}" readonly></td>
                                                                <td><input type="text" name="TMOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> DevelopedFor}}" readonly></td>
                                                                <td><input type="text" name="TMRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> RoleInModule}}" readonly></td>
                                                                <td><input type="month" name="TMYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> TMYear}}" readonly></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                       Article % Research Paper Published --}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">5. Article & Research Paper Published</h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsArticleAndResearchPaperPublished" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Article & Research Paper</th>
                                                            <th>Published By ( Origination/Paper/Journal Name )</th>
                                                            <th>Language ( Marathi/Hindi/English )</th>
                                                            <th>Year Of Publication</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $ArticleResearchDetailsToShow as $item5 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item5-> ArticleSrNo}}</td>
                                                                <td><input type="text" name="ARPaper[]" placeholder="Enter paper" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> ArticlePaper}}" readonly> </td>
                                                                <td><input type="text" name="ARPublishedBy[]" placeholder="Enter published by" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> PublishedBy}}" readonly></td>
                                                                <td><input type="text" name="ARLanguage[]" placeholder="Enter language" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> ArticleLanguage}}" readonly></td>
                                                                <td><input type="month" name="ARYear[]" placeholder="Enter year" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> YearOfPublication}}" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-5 required">
                                <label class="fieldlabels">
                                    Knowledge Of MS Office:
                                </label>
                            </div>
                            @if( $KnowOfMSOffice == 'Yes' )
                                <div class="col-md-6 row ml-2">
                                    <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;"
                                           disabled checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @elseif( $KnowOfMSOffice == 'No' )
                                <div class="col-md-6 row ml-2">
                                    <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;" disabled>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @else
                                <div class="col-md-6 row ml-2">
                                    <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @endif
                        </div>


                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-4">
                                <label class="fieldlabels">Presentation Skill: </label></div>
                            <div class="col-md-7">
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="PresentationSkill" disabled>
                                    <option>Select</option> <!-- Default "Select" option -->
                                    {{--                                    @foreach($SkillRemarks as $item=>$item2)--}}
                                    {{--                                        <option value ="{{$item2->value}}">{{$item2->text}}</option>--}}
                                    {{--                                    @endforeach--}}
                                    @foreach($SkillRemarks as $item => $item2)
                                        <option value="{{$item2->value}}"
                                                @if($item2->value == $PresentationSkill) selected @endif>{{$item2->text}}
                                        </option>
                                    @endforeach



                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-4">
                                <label class="fieldlabels">Communication Skill: </label></div>
                            <div class="col-md-7">
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CommunicationSkill" disabled>
                                    <option>Select</option> <!-- Default "Select" option -->

                                    @foreach($SkillRemarks as $item => $item2)
                                        <option value="{{$item2->value}}"
                                                @if($item2->value == $CommunicationSkill) selected @endif>{{$item2->text}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-4">
                                <label class="fieldlabels">Co-ordination Skill: </label></div>
                            <div class="col-md-7">
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CoordinationSkill" disabled>
                                    <option>Select</option> <!-- Default "Select" option -->


                                    @foreach($SkillRemarks as $item => $item2)
                                        <option value="{{$item2->value}}"
                                                @if($item2->value == $CoordinationSkill) selected @endif>{{$item2->text}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-4">
                                <label class="fieldlabels">Writing Skill: </label></div>
                            <div class="col-md-7">
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="WritingSkill" disabled>
                                    <option>Select</option> <!-- Default "Select" option -->
                                    @foreach($SkillRemarks as $item => $item2)
                                        <option value="{{$item2->value}}"
                                                @if($item2->value == $WritingSkill) selected @endif>{{$item2->text}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--                       Language Proficiency --}}

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="cardForEducation">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">6. Language Proficiency</h4>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table id="faqsLanguageProficiency" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Language Known</th>
                                                            <th>Read ( Yes/No )</th>
                                                            <th>Write ( Yes/No )</th>
                                                            <th>Speak ( Yes/No )</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $LanguageProficiencyDetailsToShow as $item6 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item6-> LanguageSrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPKnown[]" class="QualificationDropDown" id="LPKnown" disabled readonly="">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($LanguageDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->LanguagesKnown) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPRead[]" class="QualificationDropDown" id="LPRead" disabled readonly="">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Read) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPWrite[]" class="QualificationDropDown" id="LPWrite" disabled readonly="">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Write) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPSpeak[]" class="QualificationDropDown" id="LPSpeak" disabled readonly="">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Speak) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-5 required">
                                <label class="fieldlabels">
                                    Currently You Are Working Full Time
                                </label>
                            </div>
                            @if( $CurrentlyWorking == 'Yes' )
                                <div class="col-md-6 row ml-2">
                                    <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;" disabled checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @elseif( $CurrentlyWorking == 'No' )
                                <div class="col-md-6 row ml-2">
                                    <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;" disabled>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @else
                                <div class="col-md-6 row ml-2">
                                    <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="button" name="next" id="step3" class="next action-button" value="Next" />

{{--                    <input type="button" name="next" id="step3" class="next action-button" value="Submit" />--}}
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>

                {{--                step 4--}}
                <fieldset id="">

                    <div class="form-card" style="width: 100%">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="fs-title">Applied For:</h2>
                            </div>
                            <div class="col-md-6">
                                <h2 class="steps">Step 4 - 5</h2>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row">
                            <div class="col-md-4 required">
                                <label class="fieldlabels">Choose: </label></div>
                            <div class="col-md-7">
                                <select class="QualificationDropDown" id="choosevalue" DISABLED readonly="">
                                    <option>Select</option>
                                    <option >A</option>
                                    <option >B</option>
                                    <option >C</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row" id="ASelect" style="display: none">
                            <div class="col-md-4 required">
                                <label class="fieldlabels">Choose: </label></div>
                            <div class="col-md-7">
                                <select class="QualificationDropDown" disabled readonly="">
                                    <option >A1</option>
                                    <option >A2</option>
                                    <option >A3</option>
                                    <option >A4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row"id="BSelect" style="display: none">
                            <div class="col-md-4 required">
                                <label class="fieldlabels">Choose: </label></div>
                            <div class="col-md-7">
                                <select class="QualificationDropDown" disabled readonly="">
                                    <option >B1</option>
                                    <option >B2</option>
                                    <option >B3</option>
                                    <option >B4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 row" id="CSelect" style="display: none">
                            <div class="col-md-4 required">
                                <label class="fieldlabels">Choose: </label></div>
                            <div class="col-md-7">
                                <select class="QualificationDropDown" disabled readonly="">
                                    <option >C1</option>
                                    <option >C2</option>
                                    <option >C3</option>
                                    <option >C4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{--                    <br>--}}
                    {{--                    <div class="col-md-6 mb-2 row"></div>--}}
                    {{--                    <br>--}}


                    {{--                    <div class="col-md-6 mb-2 row">--}}
                    {{--                        <div class="col-md-4 required"><label class="fieldlabels">PinCode: </label></div>--}}
                    {{--                        <div class="col-md-7">--}}
                    {{--                            <input type="text" value="{{$CurPincode}}" placeholder="Enter PinCode" id="pincode" maxlength="6" oninput="MobileNumberOnly(this)" />--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div>

                        <div class="col-md-12 mb-2 row">
                            <div class="col-md-4 ">
                                <label class="fieldlabels">Declaration:</label>

                            </div>

                            <div style="text-align: left; font-weight:bold " >

                                <input type="checkbox" id="Declaration" class="Declaration1" name="Declaration" value="Boat" style="margin-left:20px; height:20px; width:20px; padding-left: 5px" checked disabled readonly="">

                                I hereby declare that all statements made in this application are true, completed and corrected to
                                the best of my knowledge and belief. I understand that in the event of any information being found suppressed/false
                                or incorrect or any ineligibility being detected before or after the selection process, my candidature is liable to be cancelled.
                                I know that mere eligibility doesn't guarantee to be listed in State Resource Person Panel. Based on application received
                                MSRLM reserves the right to shortlist candidates based on qualification. <br>
                                <u>Note:</u> Candidate should attach self-attested photocopy of all necessary document (ID proof,Address
                                proof, age certificates, educational certificates, Experience certificates, etc.) along with this application form.

                                {{--                                <input type="text" value="{{$PerCity}}" placeholder="Enter City" id="perCity" oninput="restrictWhiteSpace(this)"  />--}}
                            </div>
                        </div>

                    </div>



                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>


            </form>
        </div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        $(document).ready(function () {
            debugger;

            var current_fs, next_fs, previous_fs;
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $("#step1").click(function () {
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();

                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $("#step2").click(function () {
                debugger;
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();

                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $("#step3").click(function () {
                debugger;
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();

                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(++current);

            });


            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({ 'opacity': opacity });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function () {
                return false;
            })
        });
    </script>

@endsection

