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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

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
            width: 20%;
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

        .AadharNo{
            display: block;
            font-weight: 300;
            font-style: italic;
            padding: 5px;
        }

        label.valid .AadharNo {
            color: #389FD4;
            font-weight:bold;
        }

        label.invalid .AadharNo {
            color: #f00;
        }


        /*input.valid ~ .icons .check{*/
        /*    opacity: 1;*/
        /*    visibility: visible;*/
        /*    transform: scale(1);*/
        /*}*/
        /*input.invalid ~ .icons .x{*/
        /*    opacity: 1;*/
        /*    visibility: visible;*/
        /*    transform: scale(1);*/
        /*}*/
        /*.icons {*/
        /*    position: absolute;*/
        /*    right: 12px;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    pointer-events: none;*/
        /*    width: 20px;*/
        /*    height: 20px;*/
        /*    transition: all .25s ease;*/
        /*    margin-top: -12%;*/

        /*}*/
        /*i {*/
        /*    position: absolute;*/
        /*    transition: all .25s ease;*/
        /*    font-size: 2.3rem;*/
        /*    opacity: 0;*/
        /*    visibility: hidden;*/
        /*    transform: scale(.5);*/
        /*}*/
        /*.check {*/
        /*    color: #3aba6f;*/
        /*    text-shadow: 0px 5px 10px rgba(58, 186, 111, .3);*/
        /*}*/
        /*.x {*/
        /*    color: rgb(240, 90, 92);*/
        /*    text-shadow: 0px 5px 10px rgba(240, 90, 92, .3);*/
        /*}*/
        /*input:focus {*/
        /*    transform: translate(0,-6px);*/
        /*    box-shadow: 0px 15px 25px 0px rgba(0,0,0,.09);*/
        /*    padding-left: 20px;*/
        /*}*/
        /*input:focus ~ .icons {*/
        /*    transform: translate(0, -6px);*/
        /*}*/

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
                    <li id="confirm"><strong>Finish</strong></li>
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
                                <h2 class="steps">Step 1 - 5</h2>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">FirstName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="FirstName" placeholder="Enter FirstName"
                                           value="{{$FirstName}}" id="FirstName" onkeypress="return AvoidSpace(event)"/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">MiddleName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="MiddleName" placeholder="Enter MiddleName"
                                           value="{{$MiddleName}}" id="MiddleName" onkeypress="return AvoidSpace(event)"/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">LastName: </label></div>
                                <div class="col-md-7">
                                    <input type="text" name="LastName" placeholder="Enter LastName"
                                           value="{{$LastName}}" id="LastName" onkeypress="return AvoidSpace(event)" />
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
                                    <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="categories">
                                        <option>Select</option> <!-- Default "Select" option -->
{{--                                        @foreach($CategoryDetails as $item=>$item2)--}}
{{--                                            <option value ="{{$item2->value}}">{{$item2->text}}</option>--}}
{{--                                        @endforeach--}}
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
                                    <input type="date" value="{{$DateOfBirth}}" placeholder="" id="dateOfBirth" />
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
                                    <input type="text" id="aadharInput"  value="{{$aadharInput}}" maxlength="14" oninput="handleInputAadhar(event)"><br>
                                    <span class="AadharNo"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">Pan Card</label></div>
                                <div class="col-md-7">
                                    <input type="text" id="pancardInput" value="{{$pancardNo}}" maxlength="10" oninput="handleInputPanCard(event)"><br>
                                    <span class="panCard"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels">
                                        Upload Photo:
                                    </label>
                                </div>

                                <div class="col-md-7">
                                    <input type='file' id="imageUpload" name='file' class="form-control">

                                    <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
                                    <div class='alert alert-success mt-2 d-none' id="responseMsg" role="alert">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required">
                                    <label class="fieldlabels" >Upload Signature: </label></div>
                                <div class="col-md-7">
                                    <input type='file' id="signatureUpload" name='file1' class="form-control">

                                    <div class='alert alert-danger mt-2 d-none text-danger' id="err_fileSign"></div>
                                    <div class='alert alert-success mt-2 d-none' id="responseMsgSign" role="alert">

                                    </div>
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
                                               style="height:25px; width:25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @elseif($Domicile == 'No')
                                    <div class="col-md-6 row ml-2">
                                        <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
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
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @elseif( $Handicap == 'NO' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;" >
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes"
                                               style="height:25px; width:25px; vertical-align: middle; " onchange="showStuff('1', this); return false;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                        <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;">
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
                                        {{--                                        <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap"  />--}}
                                        <select style="width: 100%" name="HandicapTypes" class="QualificationDropDown" id="HandicapTypeHere">
                                            <OPTION>Select</OPTION>
{{--                                            @foreach($TypesOfHandicap as $item=>$item2)--}}
{{--                                                <option value ="{{$item2->value}}">{{$item2->text}}</option>--}}
{{--                                            @endforeach--}}
                                            @foreach($TypesOfHandicap as $item => $item2)
                                                <option value="{{$item2->value}}"
                                                        @if($item2->value == $TypeOfHandicap) selected @endif>{{$item2->text}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2 row" style="display: block;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>
                                    <div class="col-md-7">

                                        <select style="width: 100%" name="HandicapPercentage" class="QualificationDropDown" id="PerceentOfHandicap">
                                            <OPTION>Select</OPTION>
{{--                                            @foreach($PerOfHandicap as $item=>$item2)--}}
{{--                                                <option value ="{{$item2->value}}">--}}
{{--                                                        @if($item2->value == $PercentageOfHandicap) selected @endif{{$item2->text}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}

                                            @foreach($PerOfHandicap as $item => $item2)
                                                <option value="{{$item2->value}}"
                                                        @if($item2->value == $PercentageOfHandicap) selected @endif>{{$item2->text}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            @elseif( $Handicap == 'NO' )

                                <div class="col-md-6 mb-2 row" style="display: none;" id="HandicapType">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">If Yes, Handicap Type: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap"  />
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2 row" style="display: none;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>
                                    <div class="col-md-7">
                                        <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap"  />
                                    </div>
                                </div>

                            @else

                                <div class="col-md-6 mb-2 row" style="display: none;" id="HandicapType">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">If Yes, Handicap Type: </label></div>

                                    <div class="col-md-7">

                                        <select style="width: 100%" name="HandicapTypes" class="QualificationDropDown" id="HandicapTypeHere">
                                            <OPTION>Select</OPTION>
                                            @foreach($TypesOfHandicap as $item=>$item2)
                                                <option value ="{{$item2->value}}">{{$item2->text}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-2 row" style="display: none;" id="perOfHandicap">
                                    <div class="col-md-4 required">
                                        <label class="fieldlabels">Percentage Of Handicap: </label></div>


                                    <div class="col-md-7">

                                        <select style="width: 100%" name="HandicapPercentage" class="QualificationDropDown" id="PerceentOfHandicap">
                                            <OPTION>Select</OPTION>
                                            @foreach($PerOfHandicap as $item=>$item2)
                                                <option value ="{{$item2->value}}">{{$item2->text}}</option>
                                            @endforeach
                                        </select>
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
                                               style="height:25px; width:25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Female</b></label></div>
                                    </div>
                                @elseif( $Sex == 'Female' )
                                    <div class="col-md-6 row ml-2">
                                        <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male"
                                               style="height:25px; width:25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Female</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-6 row ml-2">
                                        <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male"
                                               style="height:25px; width:25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Male</b></label></div>

                                        <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
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
                                               style="height:25px; width:25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                        <div><label class=" td1" style="margin-left:15px;"><b>Not Married</b></label></div>
                                    </div>
                                @elseif( $MarriedStatus == 'Not Married' )
                                    <div class="col-md-7 row ml-2">
                                        <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married"
                                               style="height:25px; width:25px; vertical-align: middle;" >
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" checked>
                                        <div><label class=" td1" style="margin-left:15px;"><b>Not Married</b></label></div>
                                    </div>
                                @else
                                    <div class="col-md-7 row ml-2">
                                        <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married"
                                               style="height:25px; width:25px; vertical-align: middle;" >
                                        <div><label class=" td1" style="margin-left:15px;"><b>Married</b></label></div>

                                        <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married"
                                               style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
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
                                    <input type="text" value="{{$CurBuildingName}}" placeholder="Enter Building Name" id="buildingName" oninput="restrictWhiteSpace(this)" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Street Name, Area Locality: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurBuildingName}}" placeholder="Enter Street Name" id="streetName" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">City: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurCity}}" placeholder="Enter City" id="city" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">State: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurState}}" placeholder="Enter State" id="state" oninput="restrictWhiteSpace(this)" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">District: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurCity}}" placeholder="Enter District" id="district" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Landmark: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurLandmark}}" placeholder="Enter Landmark" id="landmark" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">PinCode: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$CurPincode}}" placeholder="Enter PinCode" id="pincode" maxlength="6" oninput="MobileNumberOnly(this)" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <input type="checkbox" id="SameAs" name="SameAs" value="Boat" style="margin-top:14px;
                                margin-left:50px; height:25px; width:25px; vertical-align: middle; ">

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
                                    <input type="text" value="{{$PerBuildingName}}" placeholder="Enter Building Name" id="perBuildingName" oninput="restrictWhiteSpace(this)" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Street Name, Area Locality: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerStreetName}}" placeholder="Enter Street Name" id="perStreetName" oninput="restrictWhiteSpace(this)" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">City: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerCity}}" placeholder="Enter City" id="perCity" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">State: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerState}}" placeholder="Enter State" id="perState" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">District: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerState}}" placeholder="Enter District" id="perDistrict" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">Landmark: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerLandmark}}" placeholder="Enter Landmark" id="perLandmark" oninput="restrictWhiteSpace(this)"  />
                                </div>
                            </div>

                            <div class="col-md-6 mb-2 row">
                                <div class="col-md-4 required"><label class="fieldlabels">PinCode: </label></div>
                                <div class="col-md-7">
                                    <input type="text" value="{{$PerPincode}}" placeholder="Enter PinCode" id="perPincode" maxlength="6" oninput="MobileNumberOnly(this)"/>
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
                                <h2 class="steps">Step 2 - 5</h2>
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
                                                            <th>Stream ( Science / Comps )</th>
                                                            <th>School / College / University / Board</th>
                                                            <th>PERCENTAGE / GRADE</th>
                                                            <th>Year Of Passing</th>
                                                            <th>Subject / Specialization</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($EducationalDetailsToShow as $item)
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item-> SrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="Qualification[]" class="QualificationDropDown" id="Qualification">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($EducationDetails as $item1)
                                                                            <option value="{{$item1->value}}" @if($item1->value == $item->Qualification) selected @endif>{{$item1->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="Stream[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{ $item-> STREAM }}"></td>
                                                                <td><input type="text" name="CollegeName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> CollegeName}}"></td>
                                                                <td><input type="text" name="Percentage[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> Mark}}"></td>
                                                                <td><input type="month" name="year[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> YearOfPassing}}"></td>
                                                                <td><input type="text" name="Subject[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item-> Subjects}}"></td>
                                                                <td class="mt-10"><button type="button" class="" onclick="DeleteRow('{{$item->SrNo}}','EducationalDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i></button></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{--                                                data-value="{{$item-> SrNo}}"--}}
                                                <div class="text-center"><button type="button" id="addfaqsEducational" data-value="{{$countEducational}}" class="badgeAdd"><i class="fa fa-plus"></i> ADD NEW</button></div>
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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $professionalDetailsToShow as $item1 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item1-> ProfessionalSrNo}}</td>
                                                                <td><input type="text" name="otherCerti[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{ $item1-> OtherCertification }}"></td>
                                                                <td><input type="text" name="otherOrg[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> BoardOrganization}}"></td>
                                                                <td><input type="month" name="otherYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> YearOfPassing}}"></td>
                                                                <td><input type="text" name="otherPerc[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1-> Percentage}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item1->ProfessionalSrNo}}','professionalDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsOthers" data-value="{{$countProfessional}}" class="badgeAdd"><i class="fa fa-plus"></i> ADD NEW</button></div>
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
                                <h2 class="steps">Step 3 - 5</h2>
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
                                                            <th>Role / Nature Of Duties</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $ExperienceDetailsToShow as $item2 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item2-> ExperienceSrNo}}</td>
                                                                <td><input type="text" name="ExpOrg[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item2-> NameOfOrganization }}"></td>
                                                                <td><input type="date" name="ExpJoining[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> JoiningDate}}"></td>
                                                                <td><input type="date" name="ExpLeaving[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> LeavingDate}}"></td>
                                                                <td><input type="text" name="ExpTotal[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> TotalExperience}}"></td>
                                                                <td><input type="text" name="ExpPosition[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> PositionHeld}}"></td>
                                                                <td><input type="text" name="ExpRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2-> RoleOfDuties}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item2->ExperienceSrNo}}','ExperienceDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsExperienceTable" data-value="{{$countExperience}}" class="badgeAdd" >
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
                                                    <input type="text" id="totalExperience" value="{{$TotalExperienceStepThree}}" placeholder="Total Experience" class="form-control" readonly onclick="calculateTotalExperience()">

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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $WorkshopDetailsToShow as $item3 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item3-> WorkshopSrNo}}</td>
                                                                <td><input type="text" name="WorkshopTrainingP[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item3-> NameOfProgram }}"></td>
                                                                <td><input type="text" name="workshopOri[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> ConductedBy}}"></td>
                                                                <td><input type="number" name="workshopDura[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> DuraionDays}}"></td>
                                                                <td><input type="month" name="WorkshopYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3-> WorkshopYear}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item3->WorkshopSrNo}}','WorkshopDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsWorkshopTable" data-value="{{$countWorkshop}}" class="badgeAdd">
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $TrainingConductedDetailsToShow as $item4 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item4-> TCSrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="TrainingsConductedAS[]" class="QualificationDropDown" id="Qualification">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($TrainingConducted as $item1)
                                                                            <option value="{{$item1->value}}" @if($item1->value == $item4->ConductedAsRole) selected @endif>{{$item1->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" name="TCOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ConductedBy}}"></td>
                                                                <td><input type="text" name="TCTrainingProgram[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> NameOfProgram}}"></td>
                                                                <td><input type="text" name="TCSubject[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> Subjects}}"></td>
                                                                <td><input type="number" name="TCDurationOfTP[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> DurationOfProgram}}"></td>
                                                                <td><input type="month" name="TCYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> TrainingConductedYear}}"></td>
                                                                <td><input type="number" name="TCParticipant[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ParticipantsParticipated}}"></td>
                                                                <td><input type="text" name="TCVenue[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> ProgramVenue}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item4->TCSrNo}}','TrainingConductedDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsTrainingConductedTable" data-value="{{$countTrainingConducted}}" class="badgeAdd">
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $TrainingModuleDetailsToShow as $item4 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item4-> TrainingModuleSrNo}}</td>
                                                                <td><input type="text" name="TMName[]" class="form-control"  oninput="restrictWhiteSpace(this)" value="{{ $item4-> NameOfModule }}"></td>
                                                                <td><input type="text" name="TMOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> DevelopedFor}}"></td>
                                                                <td><input type="text" name="TMRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> RoleInModule}}"></td>
                                                                <td><input type="month" name="TMYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4-> TMYear}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item4->TrainingModuleSrNo}}','TrainingModuleDetails','WorkshopDetails')" >
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsTrainingModuleDeveloped" data-value="{{$countTrainingModule}}" class="badgeAdd">
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $ArticleResearchDetailsToShow as $item5 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item5-> ArticleSrNo}}</td>
                                                                <td><input type="text" name="ARPaper[]" placeholder="Enter paper" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> ArticlePaper}}"> </td>
                                                                <td><input type="text" name="ARPublishedBy[]" placeholder="Enter published by" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> PublishedBy}}"></td>
                                                                <td><input type="text" name="ARLanguage[]" placeholder="Enter language" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> ArticleLanguage}}"></td>
                                                                <td><input type="month" name="ARYear[]" placeholder="Enter year" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5-> YearOfPublication}}"></td>
                                                                <td class="mt-10">
                                                                    <button type="button" class="" onclick="DeleteRow('{{$item5->ArticleSrNo}}','ArticleResearch')">
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsArticleResearchPaperPublished"  data-value="{{$countArticleResearch}}" class="badgeAdd">
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
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
                                           style="height:25px; width:25px; vertical-align: middle;" checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @elseif( $KnowOfMSOffice == 'No' )
                                <div class="col-md-6 row ml-2">
                                    <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;" >
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" checked>
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
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="PresentationSkill">
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
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CommunicationSkill">
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
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CoordinationSkill">
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
                                <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="WritingSkill">
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
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach( $LanguageProficiencyDetailsToShow as $item6 )
                                                            <tr>
                                                                <td style="font-size: 1em; padding: 18px 36px;">{{$item6-> LanguageSrNo}}</td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPKnown[]" class="QualificationDropDown" id="LPKnown">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($LanguageDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->LanguagesKnown) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPRead[]" class="QualificationDropDown" id="LPRead">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Read) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPWrite[]" class="QualificationDropDown" id="LPWrite">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Write) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="width: 100%" name="LPSpeak[]" class="QualificationDropDown" id="LPSpeak">
                                                                        <option>Select</option> <!-- Default "Select" option -->
                                                                        @foreach($ChoiceDetails as $item=>$item2)
                                                                            <option value="{{$item2->value}}" @if($item2->value == $item6->Speak) selected @endif>{{$item2->text}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="mt-10"><button type="button" class="" onclick="DeleteRow('{{$item6->LanguageSrNo}}','LanguageProficiency')">
                                                                        <i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red"></i></button></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center"><button type="button" id="addfaqsLanguageProficiency" data-value="{{$countLanguageProficiency}}" class="badgeAdd">
                                                        <i class="fa fa-plus"></i> ADD NEW</button>
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
                                           style="height:25px; width:25px; vertical-align: middle;" checked>
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>No</b></label></div>
                                </div>
                            @elseif( $CurrentlyWorking == 'No' )
                                <div class="col-md-6 row ml-2">
                                    <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes"
                                           style="height:25px; width:25px; vertical-align: middle;">
                                    <div><label class=" td1" style="margin-left:15px;"><b>Yes</b></label></div>

                                    <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No"
                                           style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" checked>
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
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />

                    {{--                    <input type="button" name="next" id="step3" class="next action-button" value="Submit" />--}}
                    {{--                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />--}}
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
                                <select class="QualificationDropDown" id="choosevalue" >
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
                                <select class="QualificationDropDown" >
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
                                <select class="QualificationDropDown" >
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
                                <select class="QualificationDropDown" >
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

                            <div style="text-align: left; font-weight:bold ">

                                <input type="checkbox" id="Declaration" class="Declaration1" name="Declaration" value="Boat" style="margin-left:20px; height:20px; width:20px; padding-left: 5px">

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


                    <input type="button" name="next" id="step4" class="next action-button" value="Submit" />
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>

                {{--                step 5--}}

                <fieldset id="">
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Finish:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 5 - 5</h2>
                            </div>
                        </div> <br><br>
                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <img src="{{ asset('/images/check.png') }}" class="fit-image">
                            </div>
                        </div> <br><br>
                        <div class="row justify-content-center">
                            <div class="col-7 text-center">
                                <h5 class="purple-text text-center">
                                    Your form has been successfully submitted.<a href="/Dashboard">Click Here</a>
                                </h5>
                            </div>
                        </div>
                    </div>
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

        $("#choosevalue").click(function () {
            debugger;

            var Choose = $("#choosevalue").val();

            if( Choose == 'A' ){
                $("#ASelect").show();
                $("#BSelect").hide();
                $("#CSelect").hide();
            }
            if( Choose == 'B' ){
                $("#ASelect").hide();
                $("#BSelect").show();
                $("#CSelect").hide();
            }
            if( Choose == 'C' ){
                $("#ASelect").hide();
                $("#BSelect").hide();
                $("#CSelect").show();
            }

            if( Choose == 'Select' ){
                $("#ASelect").hide();
                $("#BSelect").hide();
                $("#CSelect").hide();
            }
        })

    </script>

    <script>
        // const aadharInput = document.getElementById("aadharInput");
        // debugger;
        // // Add an event listener to restrict input to 16 digits
        // aadharInput.addEventListener("input", function() {
        //     if (this.value.length > 16) {
        //         this.value = this.value.slice(0, 16); // Trim input to 16 digits
        //     }
        // });

        function handleInputAadhar(event) {
            const value = event.target.value.replace(/\D/g, ''); // Remove non-digit characters

            const formattedValue = value
                .replace(/(\d{4})(\d{4})(\d{4})/, '$1 $2 $3') // Add spaces every 4 digits

            event.target.value = formattedValue; // Update the input value

            var emailRegexnew = /^\d{12}$/;
            const AadharNotext = document.querySelector('.AadharNo');

            if (emailRegexnew.test(value)) {
                AadharNotext.innerHTML = "Your Aadhar Card No. is Valid";
                AadharNotext.style.color = 'green';
                AadharNotext.style.fontWeight = 'bold'; // Make text bold
                AadharNotext.style.fontStyle = 'italic';
                // Show the submit button
                document.getElementById('step1').style.display = 'block';
            } else {
                AadharNotext.innerHTML = "Must be a valid Aadhar Card No.";
                AadharNotext.style.color = 'red';
                AadharNotext.style.fontWeight = 'bold'; // Make text bold
                AadharNotext.style.fontStyle = 'italic';
                // Hide the submit button
                document.getElementById('step1').style.display = 'none';
            }

            if (!value) {
                event.target.classList.remove('invalid')
                document.querySelector('#step1').disabled = false;
            }
        }

    </script>

    <script>

        function handleInputPanCard(event) {
            var panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            var inputValue = event.target.value.toUpperCase(); // Convert input value to uppercase
            const panCardtext = document.querySelector('.panCard');

            if (panPattern.test(inputValue)) {
                panCardtext.innerHTML = "Your Pancard No. is Valid";
                panCardtext.style.color = 'green';
                panCardtext.style.fontWeight = 'bold'; // Make text bold
                panCardtext.style.fontStyle = 'italic';
                // Show the submit button (assuming you have an element with ID 'step1')
                document.getElementById('step1').style.display = 'block';
            } else {
                panCardtext.innerHTML = "Must be a valid Pancard No.";
                panCardtext.style.color = 'red';
                panCardtext.style.fontWeight = 'bold'; // Make text bold
                panCardtext.style.fontStyle = 'italic';
                // Hide the submit button (assuming you have an element with ID 'step1')
                document.getElementById('step1').style.display = 'none';
            }

            if (!inputValue) {
                event.target.classList.remove('invalid');
                // Enable the submit button (assuming you have an element with ID 'step1')
                document.querySelector('#step1').disabled = false;
            }
        }


    </script>

    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        function DeleteRow(id, name) {
            debugger;

            var DeleteRowId = id;
            var tableName = name;

            if (DeleteRowId != null || DeleteRowId != "" ) {
                var msg = "Are You Sure You Want To Delete?";
            }

            var fd = new FormData();

            // Append data
            fd.append('DeleteRowId', DeleteRowId);
            fd.append('tableName', tableName);
            fd.append('_token', CSRF_TOKEN);

            if (confirm(msg)) {
                $.ajax({
                    url: "{{route('DeleteRowFromTable')}}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        debugger;

                        if (data == 1) {
                            swal({
                                title: 'Row Deleted Successfully',
                                text: 'Please Wait...',
                                icon: 'success',
                                timer: 2000,
                                buttons: false,
                            }).then(() => {
                                window.location.href = '/Index';
                            });
                        } else {
                            swal({
                                title: 'Hehe Row Deleted Successfully',
                                text: 'Please Wait...',
                                icon: 'success',
                                timer: 2000,
                                buttons: false,
                            }).then(() => {

                            });
                        }
                    }
                });
                return true;
            } else {
                return false;
            }

        }

    </script>

    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        $(document).ready(function () {

            document.body.style.zoom = "95%";

            var current_fs, next_fs, previous_fs;
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            // $(".next").click(function () {

            // current_fs = $(this).parent();
            // next_fs = $(this).parent().next();

            // current_fs = $(this).parents('fieldset');
            // next_fs = $(this).parents('fieldset').next();

            // next_fs.addClass('current');
            // //hide the current fieldset with style
            // current_fs.removeClass('current');

            $("#step1").click(function () {
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();
                debugger;
                var FirstName = $("#FirstName").val();
                var MiddleName = $("#MiddleName").val();
                var LastName = $("#LastName").val();
                var email = $("#email").val();
                var Mobile = $("#Mobile").val();
                var categories = $("#categories").val();
                var dateOfBirth = $("#dateOfBirth").val();
                var calculateAge = $("#calculateAge").val();
                var DOMRadio = $(".DOM:checked").val();
                var SexRadio = $(".Sex:checked").val();
                var MSRadio = $(".MSrad:checked").val();
                var AYFHCRadio = $(".AYFHC:checked").val();
                var buildingName = $("#buildingName").val();
                var streetName = $("#streetName").val();
                var city = $("#city").val();
                var state = $("#state").val();
                var district = $("#district").val();
                var landmark = $("#landmark").val();
                var pincode = $("#pincode").val();
                var aadharInput = $("#aadharInput").val();
                var pancardNo = $("#pancardInput").val();

                if (FirstName == null || FirstName == "" ||
                    MiddleName == null || MiddleName == "" ||
                    LastName == null || LastName == "" ||
                    email == null || email == "" ||
                    Mobile == null || Mobile == "" ||
                    categories == null || categories == "Select" || categories == "" ||
                    dateOfBirth == null || dateOfBirth == "" ||
                    calculateAge == null || calculateAge == "" ||
                    DOMRadio == null || DOMRadio == "" ||
                    SexRadio == null || SexRadio == "" ||
                    MSRadio == null || MSRadio == "" ||
                    AYFHCRadio == null || AYFHCRadio == "" ||
                    buildingName == null || buildingName == "" ||
                    streetName == null || streetName == "" ||
                    city == null || city == "" ||
                    state == null || state == "" ||
                    district == null || district == "" ||
                    pincode == null || pincode == "" ||
                    aadharInput == null || aadharInput == "" ||
                    pancardNo == null || pancardNo == ""
                ) {
                    swal({
                        title: 'Please fill out all required fields.',
                        text: 'Required fields are mandatory',
                        icon: 'error',
                        timer: 2000,
                        buttons: false,
                    })
                    return false;
                } else {

                    var AYFHC = document.getElementsByName('AYFHC1');

                    for (i = 0; i < AYFHC.length; i++) {
                        if (AYFHC[i].checked) {
                            if (AYFHC[i].value == "Yes") {
                                rad = "Yes";
                                if ( $("#PerceentOfHandicap").val() == "" || $("#PerceentOfHandicap").val() == null || $("#PerceentOfHandicap").val() == "Select" &&
                                    $("#HandicapTypeHere").val() == "" || $("#HandicapTypeHere").val() == null || $("#HandicapTypeHere").val() == "Select"
                                ) {
                                    swal({
                                        title: 'Please fill out required fields.',
                                        text: 'Required fields are mandatory',
                                        icon: 'error',
                                        timer: 2000,
                                        buttons: false,
                                    })
                                    return false;
                                }
                            }
                        }
                    }

                    const uploadedImage = document.getElementById('uploadedImage');

                    const src = uploadedImage.getAttribute('src');
                    if (!src) {
                        swal({
                            title: 'Please Upload Users Photo',
                            text: 'Required fields are mandatory',
                            icon: 'error',
                            timer: 2000,
                            buttons: false,
                        })
                        return false;
                    }

                    const uploadedSignature = document.getElementById('uploadedSignature');

                    const srcSign = uploadedSignature.getAttribute('src');
                    if (!srcSign) {
                        swal({
                            title: 'Please Upload Users Signature',
                            text: 'Required fields are mandatory',
                            icon: 'error',
                            timer: 2000,
                            buttons: false,
                        })
                        return false;
                    }

                    debugger;

                    var FirstName = $("#FirstName").val();
                    var MiddleName = $("#MiddleName").val();
                    var LastName = $("#LastName").val();
                    var email = $("#email").val();
                    var Mobile = $("#Mobile").val();
                    var categories = $("#categories").val();
                    var dateOfBirth = $("#dateOfBirth").val();
                    var calculateAge = $("#calculateAge").val();
                    var DOMRadio = $(".DOM:checked").val();
                    var SexRadio = $(".Sex:checked").val();
                    var MSRadio = $(".MSrad:checked").val();
                    var AYFHCRadio = $(".AYFHC:checked").val();
                    var buildingName = $("#buildingName").val();
                    var streetName = $("#streetName").val();
                    var city = $("#city").val();
                    var state = $("#state").val();
                    var district = $("#district").val();
                    var landmark = $("#landmark").val();
                    var pincode = $("#pincode").val();
                    var perBuildingName = $("#perBuildingName").val();
                    var perStreetName = $("#perStreetName").val();
                    var perCity = $("#perCity").val();
                    var perState = $("#perState").val();
                    var perDistrict = $("#perDistrict").val();
                    var perLandmark = $("#perLandmark").val();
                    var perPincode = $("#perPincode").val();
                    var PercentOfHandicap = $("#PerceentOfHandicap").val();
                    var HandicapTypeHere = $("#HandicapTypeHere").val();
                    var aadharInput = $("#aadharInput").val();
                    var pancardNo = $("#pancardInput").val();

                    var fd = new FormData();
                    fd.append('FirstName', FirstName);
                    fd.append('MiddleName', MiddleName);
                    fd.append('LastName', LastName);
                    fd.append('email', email);
                    fd.append('Mobile', Mobile);
                    fd.append('categories', categories);
                    fd.append('dateOfBirth', dateOfBirth);
                    fd.append('calculateAge', calculateAge);
                    fd.append('DOMRadio', DOMRadio);
                    fd.append('SexRadio', SexRadio);
                    fd.append('MSRadio', MSRadio);
                    fd.append('AYFHCRadio', AYFHCRadio);
                    fd.append('buildingName', buildingName);
                    fd.append('streetName', streetName);
                    fd.append('city', city);
                    fd.append('state', state);
                    fd.append('district', district);
                    fd.append('landmark', landmark);
                    fd.append('pincode', pincode);
                    fd.append('perBuildingName', perBuildingName);
                    fd.append('perStreetName', perStreetName);
                    fd.append('perCity', perCity);
                    fd.append('perState', perState);
                    fd.append('perDistrict', perDistrict);
                    fd.append('perLandmark', perLandmark);
                    fd.append('perPincode', perPincode);
                    fd.append('PercentOfHandicap', PercentOfHandicap);
                    fd.append('HandicapTypeHere', HandicapTypeHere);
                    fd.append('aadharInput', aadharInput);
                    fd.append('pancardNo', pancardNo);
                    fd.append('_token', CSRF_TOKEN);

                    debugger;

                    $.ajax({
                        url: "{{route('PartISubmit')}}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (data) {
                            debugger;

                            if(data == '1'){
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
                            }
                        }
                    });
                }
            });

            $("#step2").click(function () {
                debugger;
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();

                // Educational Details

                var Qualification1 = [];
                $("select[name='Qualification[]']").each(function() {
                    Qualification1.push($(this).val());
                });

                var Stream1 = [];
                $("input[name='Stream[]']").each(function() {
                    Stream1.push($(this).val());
                });

                var CollegeName1 = [];
                $("input[name='CollegeName[]']").each(function() {
                    CollegeName1.push($(this).val());
                });

                var Percentage1 = [];
                $("input[name='Percentage[]']").each(function() {
                    Percentage1.push($(this).val());
                });

                var year1 = [];
                $("input[name='year[]']").each(function() {
                    year1.push($(this).val());
                });

                var Subject1 = [];
                $("input[name='Subject[]']").each(function() {
                    Subject1.push($(this).val());
                });

                var otherCerti1 = [];
                $("input[name='otherCerti[]']").each(function() {
                    otherCerti1.push($(this).val());
                });

                var otherOrg1 = [];
                $("input[name='otherOrg[]']").each(function() {
                    otherOrg1.push($(this).val());
                });

                var otherYear1 = [];
                $("input[name='otherYear[]']").each(function() {
                    otherYear1.push($(this).val());
                });

                var otherPerc1 = [];
                $("input[name='otherPerc[]']").each(function() {
                    otherPerc1.push($(this).val());
                });

                var fd = new FormData();

                // Append data
                fd.append('Qualification', Qualification1);
                fd.append('Stream', Stream1);
                fd.append('CollegeName', CollegeName1);
                fd.append('Percentage', Percentage1);
                fd.append('year', year1);
                fd.append('Subject', Subject1);
                fd.append('otherCerti', otherCerti1);
                fd.append('otherOrg', otherOrg1);
                fd.append('otherYear', otherYear1);
                fd.append('otherPerc', otherPerc1);
                fd.append('_token', CSRF_TOKEN);

                $.ajax({
                    url: "{{route('PartIISubmit')}}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        debugger;

                        var Status = data.Status;
                        var otherStatus = data.otherStatus;

                        if(Status == '1' && otherStatus == '1' ){

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
                        }
                    }
                });
            });

            $("#step3").click(function () {
                debugger;
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();
                // Experience Details

                var ExpOrg1 = [];
                $("input[name='ExpOrg[]']").each(function() {
                    ExpOrg1.push($(this).val());
                });

                var ExpJoining1 = [];
                $("input[name='ExpJoining[]']").each(function() {
                    ExpJoining1.push($(this).val());
                });

                var ExpLeaving1 = [];
                $("input[name='ExpLeaving[]']").each(function() {
                    ExpLeaving1.push($(this).val());
                });

                var ExpTotal1 = [];
                $("input[name='ExpTotal[]']").each(function() {
                    ExpTotal1.push($(this).val());
                });

                var ExpPosition1 = [];
                $("input[name='ExpPosition[]']").each(function() {
                    ExpPosition1.push($(this).val());
                });

                var ExpRole1 = [];
                $("input[name='ExpRole[]']").each(function() {
                    ExpRole1.push($(this).val());
                });

                // Workshop

                var WorkshopTrainingP1 = [];
                $("input[name='WorkshopTrainingP[]']").each(function() {
                    WorkshopTrainingP1.push($(this).val());
                });

                var workshopOri1 = [];
                $("input[name='workshopOri[]']").each(function() {
                    workshopOri1.push($(this).val());
                });

                var workshopDura1 = [];
                $("input[name='workshopDura[]']").each(function() {
                    workshopDura1.push($(this).val());
                });

                var WorkshopYear1 = [];
                $("input[name='WorkshopYear[]']").each(function() {
                    WorkshopYear1.push($(this).val());
                });

                // Training Conducted As

                var TrainingsConductedAS1 = [];
                $("select[name='TrainingsConductedAS[]']").each(function() {
                    TrainingsConductedAS1.push($(this).val());
                });

                var TCOrginationName1 = [];
                $("input[name='TCOrginationName[]']").each(function() {
                    TCOrginationName1.push($(this).val());
                });

                var TCTrainingProgram1 = [];
                $("input[name='TCTrainingProgram[]']").each(function() {
                    TCTrainingProgram1.push($(this).val());
                });

                var TCSubject1 = [];
                $("input[name='TCSubject[]']").each(function() {
                    TCSubject1.push($(this).val());
                });

                var TCDurationOfTP1 = [];
                $("input[name='TCDurationOfTP[]']").each(function() {
                    TCDurationOfTP1.push($(this).val());
                });

                var TCYear1 = [];
                $("input[name='TCYear[]']").each(function() {
                    TCYear1.push($(this).val());
                });

                var TCParticipant1 = [];
                $("input[name='TCParticipant[]']").each(function() {
                    TCParticipant1.push($(this).val());
                });

                var TCVenue1 = [];
                $("input[name='TCVenue[]']").each(function() {
                    TCVenue1.push($(this).val());
                });

                // Training Module

                var TMName1 = [];
                $("input[name='TMName[]']").each(function() {
                    TMName1.push($(this).val());
                });

                var TMOrginationName1 = [];
                $("input[name='TMOrginationName[]']").each(function() {
                    TMOrginationName1.push($(this).val());
                });

                var TMRole1 = [];
                $("input[name='TMRole[]']").each(function() {
                    TMRole1.push($(this).val());
                });

                var TMYear1 = [];
                $("input[name='TMYear[]']").each(function() {
                    TMYear1.push($(this).val());
                });

                // Article & Research Paper Published

                var ARPaper1 = [];
                $("input[name='ARPaper[]']").each(function() {
                    ARPaper1.push($(this).val());
                });

                var ARPublishedBy1 = [];
                $("input[name='ARPublishedBy[]']").each(function() {
                    ARPublishedBy1.push($(this).val());
                });

                var ARLanguage1 = [];
                $("input[name='ARLanguage[]']").each(function() {
                    ARLanguage1.push($(this).val());
                });

                var ARYear1 = [];
                $("input[name='ARYear[]']").each(function() {
                    ARYear1.push($(this).val());
                });

                // Language Proficiency

                var LPKnown1 = [];
                $("select[name='LPKnown[]']").each(function() {
                    LPKnown1.push($(this).val());
                });

                var LPRead1 = [];
                $("select[name='LPRead[]']").each(function() {
                    LPRead1.push($(this).val());
                });

                var LPWrite1 = [];
                $("select[name='LPWrite[]']").each(function() {
                    LPWrite1.push($(this).val());
                });

                var LPSpeak1 = [];
                $("select[name='LPSpeak[]']").each(function() {
                    LPSpeak1.push($(this).val());
                });

                var KOMORadio = $(".KOMO:checked").val();
                var CYAWFTRadio = $(".CYAWFT:checked").val();
                var totalExperience = $('#totalExperience').val();

                var PresentationSkill = $('#PresentationSkill').val();
                var CommunicationSkill = $('#CommunicationSkill').val();
                var CoordinationSkill = $('#CoordinationSkill').val();

                var WritingSkill = $("#WritingSkill").val();

                debugger;
                if( KOMORadio == null || KOMORadio == "" ||
                    CYAWFTRadio == null || CYAWFTRadio == "" ||
                    totalExperience == null || totalExperience == "" ||
                    PresentationSkill == null || PresentationSkill == "" || PresentationSkill == "Select" ||
                    CommunicationSkill == null || CommunicationSkill == "" || CommunicationSkill == "Select" ||
                    CoordinationSkill == null || CoordinationSkill == "" || CoordinationSkill == "Select" ||
                    WritingSkill == null || WritingSkill == "" || WritingSkill == "Select"
                ) {
                    swal({
                        title: 'Please fill out all required fields.',
                        text: 'Required fields are mandatory',
                        icon: 'error',
                        timer: 2000,
                        buttons: false,
                    })
                    return false;
                }else{
console.log(PresentationSkill);
console.log(CommunicationSkill);
console.log(CoordinationSkill);
                    var fd = new FormData();
                    // Append data
                    fd.append('ExpOrg', ExpOrg1);
                    fd.append('ExpJoining', ExpJoining1);
                    fd.append('ExpLeaving', ExpLeaving1);
                    fd.append('ExpTotal', ExpTotal1);
                    fd.append('ExpPosition', ExpPosition1);
                    fd.append('ExpRole', ExpRole1);

                    fd.append('WorkshopTrainingP', WorkshopTrainingP1);
                    fd.append('workshopOri', workshopOri1);
                    fd.append('workshopDura', workshopDura1);
                    fd.append('WorkshopYear', WorkshopYear1);

                    fd.append('TrainingsConductedAS', TrainingsConductedAS1);
                    fd.append('TCOrginationName', TCOrginationName1);
                    fd.append('TCTrainingProgram', TCTrainingProgram1);
                    fd.append('TCSubject', TCSubject1);
                    fd.append('TCDurationOfTP', TCDurationOfTP1);
                    fd.append('TCYear', TCYear1);
                    fd.append('TCParticipant', TCParticipant1);
                    fd.append('TCVenue', TCVenue1);

                    fd.append('TMName', TMName1);
                    fd.append('TMOrginationName', TMOrginationName1);
                    fd.append('TMRole', TMRole1);
                    fd.append('TMYear', TMYear1);

                    fd.append('ARPaper', ARPaper1);
                    fd.append('ARPublishedBy', ARPublishedBy1);
                    fd.append('ARLanguage', ARLanguage1);
                    fd.append('ARYear', ARYear1);

                    fd.append('LPKnown', LPKnown1);
                    fd.append('LPRead', LPRead1);
                    fd.append('LPWrite', LPWrite1);
                    fd.append('LPSpeak', LPSpeak1);

                    fd.append('KOMORadio', KOMORadio);
                    fd.append('CYAWFTRadio', CYAWFTRadio);
                    fd.append('totalExperience', totalExperience);



                    fd.append('PresentationSkill', PresentationSkill);
                    fd.append('CommunicationSkill', CommunicationSkill);
                    fd.append('CoordinationSkill', CoordinationSkill);

                    fd.append('WritingSkill', WritingSkill);



                    fd.append('_token', CSRF_TOKEN);

                    $.ajax({
                        url: "{{route('PartIIISubmit')}}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',

                        success: function (data) {
                            debugger;
                            var ExperienceStatus = data.ExperienceStatus;
                            var WorkshopStatus = data.WorkshopStatus;
                            var trainingConductedStatus = data.trainingConductedStatus;
                            var trainingModuleStatus = data.trainingModuleStatus;
                            var ArticleResearchStatus = data.ArticleResearchStatus;
                            var LanguageStatus = data.LanguageStatus;

                            if(ExperienceStatus == '1' && WorkshopStatus == '1' && trainingConductedStatus == '1'
                                && trainingModuleStatus == '1' && ArticleResearchStatus == '1'
                                && LanguageStatus == '1' ){
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
                            }
                        }

                    });
                }
            });

            $("#step4").click(function () {
                debugger;
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();

                if ($("#Declaration").is(":checked")) {

                    document.getElementById('Declaration').value="1";
                    var Declaration = document.getElementById('Declaration').value

                    debugger;

                    var fd = new FormData();
                    // Append data
                    fd.append('Declaration', Declaration);
                    fd.append('_token', CSRF_TOKEN);

                    $.ajax({
                        url: "{{route('PartIVDeclarationSubmit')}}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (data) {
                            debugger;
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

                        }
                    });
                }
                else{
                    swal({
                        title: 'Please fill out required fields.',
                        text: 'Required fields are mandatory',
                        icon: 'error',
                        timer: 2000,
                        buttons: false,
                    })
                    return false;
                }
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

    <script>
        function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
        }

        function MobileNumberOnly(input) {
            var num = /[^0-9]/gi;
            input.value = input.value.replace(num, "");
        }

        function restrictWhiteSpace(e) {
            debugger;
            $("input").on("keypress", function(e) {
                if (e.which === 32 && !this.value.length)
                    e.preventDefault();
            });
        }
    </script>

    <script type="text/javascript">
        function SameAsAbove() {
            debugger;
            if ($("#SameAs").is(":checked")) {
                var a = $('#buildingName').val();
                var b = $('#perBuildingName').val();
                $('#perBuildingName').val($('#buildingName').val());
                $('#perBuildingName').attr('disabled', 'disabled');
                $('#perStreetName').val($('#streetName').val());
                $('#perStreetName').attr('disabled', 'disabled');
                $('#perCity').val($('#city').val());
                $('#perCity').attr('disabled', 'disabled');
                $('#perState').val($('#state').val());
                $('#perState').attr('disabled', 'disabled');
                $('#perDistrict').val($('#district').val());
                $('#perDistrict').attr('disabled', 'disabled');
                $('#perLandmark').val($('#landmark').val());
                $('#perLandmark').attr('disabled', 'disabled');
                $('#perPincode').val($('#pincode').val());
                $('#perPincode').attr('disabled', 'disabled');
            } else {
                $('#perBuildingName').removeAttr('disabled');
                $('#perStreetName').removeAttr('disabled');
                $('#perCity').removeAttr('disabled');
                $('#perState').removeAttr('disabled');
                $('#perDistrict').removeAttr('disabled');
                $('#perLandmark').removeAttr('disabled');
                $('#perPincode').removeAttr('disabled');
            }
        }
        $('#SameAs').click(function () {
            SameAsAbove();
        })
    </script>

    <script type="text/javascript">
        function showStuff(id, btn) {
            debugger;

            document.getElementById("HandicapType").style.display = 'none';
            document.getElementById("perOfHandicap").style.display = 'none';

            if (id == "1") {
                document.getElementById("HandicapType").style.display = 'block';
                document.getElementById("perOfHandicap").style.display = 'block';
            }
        }
    </script>

    <script>

        // Educational Details

        var tableEducation = document.getElementById("faqsEducational").getElementsByTagName('tbody')[0];
        var addRowButtonEducation = document.getElementById("addfaqsEducational");
        var value1 = addRowButtonEducation.getAttribute("data-value");
        var rowCounterEducation = 0;
        rowCounterEducation =  value1;

        addRowButtonEducation.addEventListener("click", function() {
            debugger;
            var newRow = tableEducation.insertRow();

            if( rowCounterEducation == null || rowCounterEducation == "") {
                rowCounterEducation = 1;
            }else{
                rowCounterEducation++;
            }

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<label id="idEducation-' + rowCounterEducation + ' "  type="text"  style="font-size: 2em; padding: 10px 32px">'+rowCounterEducation+'</label>';
            cell2.innerHTML = '<select style="width: 100%" name="Qualification[]" class="QualificationDropDown" id="Qualification-' + rowCounterEducation + ' " >\n' +
                '<option>Select</option> <!-- Default "Select" option -->\n' +
                ' @foreach($EducationDetails as $item=>$item2)\n' +
                '  <option value ="{{$item2->value}}">{{$item2->text}}</option>\n' +
                ' @endforeach\n' +
                ' </select>';
            cell3.innerHTML = '<input type="text" name="Stream[]" class="form-control" placeholder="Enter Stream"  id="Stream-' + rowCounterEducation + '">';
            cell4.innerHTML = '<input type="text" name="CollegeName[]" class="form-control" placeholder="Enter Name"  id="College-' + rowCounterEducation + '">';
            cell5.innerHTML = '<input type="text" name="Percentage[]" class="form-control" placeholder="Enter Percentage" id="Mark-' + rowCounterEducation + '">';
            cell6.innerHTML = '<input type="month" name="year[]" class="form-control" placeholder="Enter Year"  id="year-' + rowCounterEducation + '">';
            cell7.innerHTML = '<input type="text" name="Subject[]" class="form-control" placeholder="Enter Subject" id="Subject-' + rowCounterEducation + '">';
            cell8.innerHTML = '<button type="button" class="" onclick="removeRowEducation(\'idEducation-' + rowCounterEducation + '\')" >' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i></button>';
        });

        function removeRowEducation(id) {
            debugger;
            const table = document.getElementById("faqsEducational").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterEducation--;
            }
            //
            // var rowToRemove = document.getElementById(id);
            // if (rowToRemove) {
            //     rowToRemove.parentNode.removeChild(rowToRemove);
            // }

            var inputString = id;
            var parts = inputString.split('-'); // Split the string at the hyphen
            var firstPart = parts[0]; // "idEducation"
            var secondPart = parts[1];

            // Delete From Table
            var DeleteRowId = secondPart;
            var tableName = 'EducationalDetails';

            if (DeleteRowId != null || DeleteRowId != "" ) {
                var msg = "Are You Sure You Want To Delete?";


                var fd = new FormData();

                // Append data
                fd.append('DeleteRowId', DeleteRowId);
                fd.append('tableName', tableName);
                fd.append('_token', CSRF_TOKEN);

                if (confirm(msg)) {
                    $.ajax({
                        url: "{{route('DeleteRowFromTable')}}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (data) {
                            debugger;

                            if (data == 1) {
                                swal({
                                    title: 'Row Deleted Successfully',
                                    text: 'Please Wait...',
                                    icon: 'success',
                                    timer: 2000,
                                    buttons: false,
                                }).then(() => {
                                    window.location.href = '/Index';
                                });
                            } else {
                                swal({
                                    title: 'Row Deleted Successfully',
                                    text: 'Please Wait...',
                                    icon: 'success',
                                    timer: 2000,
                                    buttons: false,
                                }).then(() => {

                                });
                            }
                        }
                    });
                } else {
                    return false;
                }
            }

        }

        // Other Details

        var tableOthers = document.getElementById("faqsOther").getElementsByTagName('tbody')[0];
        var addRowButtonOther = document.getElementById("addfaqsOthers");
        var valueProfessional = addRowButtonOther.getAttribute("data-value");
        var rowCounterOthers = 0;
        rowCounterOthers =  valueProfessional;

        addRowButtonOther.addEventListener("click", function() {

            debugger

            var newRow = tableOthers.insertRow();

            if( rowCounterOthers == null || rowCounterOthers == ""){
                rowCounterOthers = 1;
            }else{
                rowCounterOthers++;
            }

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            // Set the IDs and content for the cells
            cell1.innerHTML = '<p style="font-size: 2em; padding: 10px 36px;" id="Otherid'+rowCounterOthers+'">'+rowCounterOthers+'</p>';
            cell2.innerHTML = '<input type="text" name="otherCerti[]" class="form-control" placeholder="Enter Other Certificate"  id="OtherCer' + rowCounterOthers + '">';
            cell3.innerHTML = '<input type="text" name="otherOrg[]" class="form-control" placeholder="Enter Organization"  id="OtherOrg' + rowCounterOthers + '">';
            cell4.innerHTML = '<input type="month" name="otherYear[]" class="form-control" placeholder="Enter Year"  id="OtherYear' + rowCounterOthers + '">';
            cell5.innerHTML = '<input type="text" name="otherPerc[]" class="form-control" placeholder="Enter Percentage" id="OtherPerc' + rowCounterOthers + '">';
            cell6.innerHTML = '<button type="button" class="" onclick="removeRowOthers()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i></button>';
        });
        function removeRowOthers() {
            debugger;
            const table = document.getElementById("faqsOther").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterOthers--;
            }
        }

        // Experience Details

        var tableExperience = document.getElementById("faqsExperience").getElementsByTagName('tbody')[0];
        var addRowButtonExperience = document.getElementById("addfaqsExperienceTable");
        var valueExperience = addRowButtonExperience.getAttribute("data-value");
        var rowCounterExperience = 0;
        rowCounterExperience =  valueExperience;
        debugger;

        addRowButtonExperience.addEventListener("click", function() {
            debugger;

            var newRow = tableExperience.insertRow();

            if( rowCounterExperience == null || rowCounterExperience == ""){
                rowCounterExperience = 1;
            }else{
                rowCounterExperience++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="Expid'+rowCounterExperience+'">'+rowCounterExperience+'</p>';
            cell2.innerHTML = '<input type="text" name="ExpOrg[]" placeholder="Enter Organization" class="form-control" oninput="restrictWhiteSpace(this)"  id="Exp' + rowCounterExperience + '">';
            cell3.innerHTML = '<input type="date" name="ExpJoining[]" class="form-control"  id="ExpjoiningDate' + rowCounterExperience + '">';
            cell4.innerHTML = '<input type="date" name="ExpLeaving[]" class="form-control"  id="ExpleavingDate' + rowCounterExperience + '">';
            cell5.innerHTML = '<input type="text" name="ExpTotal[]" class="form-control"  id="ExpShowTotalExp ' + rowCounterExperience + '" onclick="totalExp(this.id)" >';
            cell6.innerHTML = '<input type="text" name="ExpPosition[]" class="form-control"  id="ExppositionHeld' + rowCounterExperience + '">';
            cell7.innerHTML = '<input type="text" name="ExpRole[]" class="form-control"  id="Exprole' + rowCounterExperience + '">';
            cell8.innerHTML = '<button type="button" class="" onclick="removeRowExperience()" >' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i>' +
                '</button>';
        });

        function calculateTotalExperience() {
            debugger;
            var totalYears = 0;
            var totalMonths = 0;
            var totalDays = 0;

            // Loop through all the "Year Month Days" formatted strings
            for (var i = 1; i <= rowCounterExperience; i++) {
                var expString = document.getElementById("ExpShowTotalExp " + i).value;

                // Parse the "Year Month Days" string into individual components
                var parts = expString.match(/(\d+)\s*Year\s*(\d+)\s*Month\s*(\d+)\s*Days/);
                if (parts && parts.length === 4) {
                    var years = parseInt(parts[1]);
                    var months = parseInt(parts[2]);
                    var days = parseInt(parts[3]);

                    totalYears += years;
                    totalMonths += months;
                    totalDays += days;

                    // Convert any excess days to months (if more than 30 days in total)
                    if (totalDays >= 30) {
                        totalMonths += Math.floor(totalDays / 30);
                        totalDays = totalDays % 30;
                    }
                }
            }

            // Convert any excess months to years (if more than 12 months in total)
            if (totalMonths >= 12) {
                totalYears += Math.floor(totalMonths / 12);
                totalMonths = totalMonths % 12;
            }

            // Format the total as a string
            var totalExperience = totalYears + " Year " + totalMonths + " Month " + totalDays + " Days";

            // Update the "Total Experience" input field
            var totalExperienceField = document.getElementById("totalExperience");
            if (totalExperienceField) {
                totalExperienceField.value = totalExperience;
            }
        }







        function removeRowExperience() {
            debugger;
            const table = document.getElementById("faqsExperience").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterExperience--;
            }
        }

        // Workshop & Trainings Attended

        var tableWorkshop = document.getElementById("faqsWorkshop").getElementsByTagName('tbody')[0];
        var addRowButtonWorkshop = document.getElementById("addfaqsWorkshopTable");
        var valueWorkshop = addRowButtonWorkshop.getAttribute("data-value");
        var rowCounterWorkshop = 0;
        rowCounterWorkshop = valueWorkshop;
        debugger;
        addRowButtonWorkshop.addEventListener("click", function() {

            var newRow = tableWorkshop.insertRow();

            if(rowCounterWorkshop == null || rowCounterWorkshop == ""){
                rowCounterWorkshop = 1;
            }else{
                rowCounterWorkshop++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="Workshopid'+rowCounterWorkshop+'">'+rowCounterWorkshop+'</p>';
            cell2.innerHTML = '<input type="text" name="WorkshopTrainingP[]" placeholder="Enter Training Program" class="form-control" oninput="restrictWhiteSpace(this)"  id="WorkshopTraining' + rowCounterWorkshop + '">';
            cell3.innerHTML = '<input type="text" name="workshopOri[]" placeholder="Enter Origination Name" class="form-control" oninput="restrictWhiteSpace(this)"  id="workshopOri' + rowCounterWorkshop + '">';
            cell4.innerHTML = '<input type="number" name="workshopDura[]" placeholder="Enter Days" class="form-control" oninput="restrictWhiteSpace(this)"  id="workshopDura' + rowCounterWorkshop + '">';

            cell5.innerHTML = '<input type="month" name="WorkshopYear[]" placeholder="Enter Year" class="form-control"  oninput="restrictWhiteSpace(this)" id="WorkshopYear ' + rowCounterWorkshop + '">';
            cell6.innerHTML = '<button type="button" class="" onclick="removeRowWorkshop()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i>' +
                '</button>';
        });
        function removeRowWorkshop() {
            debugger;
            const table = document.getElementById("faqsWorkshop").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterWorkshop--;
            }
        }

        // Trainings Conducted As Person

        var tableTrainingsConducted = document.getElementById("faqsTrainingConducted").getElementsByTagName('tbody')[0];
        var addRowButtonTrainingsConducted = document.getElementById("addfaqsTrainingConductedTable");
        var valueTrainingConducted = addRowButtonTrainingsConducted.getAttribute("data-value");
        var rowCounterTrainingsConducted = 0;
        rowCounterTrainingsConducted = valueTrainingConducted;
        debugger;
        addRowButtonTrainingsConducted.addEventListener("click", function() {
            debugger;

            var newRow = tableTrainingsConducted.insertRow();

            if( rowCounterTrainingsConducted == null || rowCounterTrainingsConducted == ""  ){
                rowCounterTrainingsConducted = 1;

            }else{
                rowCounterTrainingsConducted++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);
            var cell9 = newRow.insertCell(8);
            var cell10 = newRow.insertCell(9);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="Workshopid'+rowCounterTrainingsConducted+'">'+rowCounterTrainingsConducted+'</p>';
            cell2.innerHTML = '<select style="width: 100%" name="TrainingsConductedAS[]" class="QualificationDropDown" id="TrainingsConductedid'+rowCounterTrainingsConducted+'">\n' +
                '  <option>Select</option> <!-- Default "Select" option -->\n' +
                '    @foreach($TrainingConducted as $item=>$item2)\n' +
                '    <option value ="{{$item2->value}}">{{$item2->text}}</option>\n' +
                '    @endforeach\n' +
                '</select>';
            cell3.innerHTML = '<input type="text" name="TCOrginationName[]" placeholder="Enter Origination Name" class="form-control" oninput="restrictWhiteSpace(this)"  id="TCOriginationName' + rowCounterTrainingsConducted + '">';
            cell4.innerHTML = '<input type="text" name="TCTrainingProgram[]" placeholder="Enter Training Program" class="form-control" oninput="restrictWhiteSpace(this)"  id="TCTrainingProgram' + rowCounterTrainingsConducted + '">';
            cell5.innerHTML = '<input type="text" name="TCSubject[]" placeholder="Enter Subject" class="form-control"  oninput="restrictWhiteSpace(this)" id="TCSubject' + rowCounterTrainingsConducted + '">';
            cell6.innerHTML = '<input type="text" name="TCDurationOfTP[]" placeholder="Enter Duration" class="form-control"  oninput="restrictWhiteSpace(this)" id="TCDuration' + rowCounterTrainingsConducted + '">';
            cell7.innerHTML = '<input type="month" name="TCYear[]" placeholder="Enter Year" class="form-control"  oninput="restrictWhiteSpace(this)" id="TCYear' + rowCounterTrainingsConducted + '">';
            cell8.innerHTML = '<input type="number" name="TCParticipant[]" placeholder="Enter Participant Number" class="form-control"  oninput="restrictWhiteSpace(this)" id="TCParticipant' + rowCounterTrainingsConducted + '">';
            cell9.innerHTML = '<input type="text" name="TCVenue[]" placeholder="Enter Training Venue" class="form-control"  oninput="restrictWhiteSpace(this)" id="TCVenue' + rowCounterTrainingsConducted + '">';
            cell10.innerHTML = '<button type="button" class="" onclick="removeRowTrainingsConducted()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i>' +
                '</button>';
        });
        function removeRowTrainingsConducted() {
            debugger;
            const table = document.getElementById("faqsTrainingConducted").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterTrainingsConducted--;
            }
        }

        //  Training Module Developed

        var tableTrainingModule = document.getElementById("faqsTrainingModuleDeveloped").getElementsByTagName('tbody')[0];
        var addRowButtonTrainingModule = document.getElementById("addfaqsTrainingModuleDeveloped");
        var valueTrainingModule = addRowButtonTrainingModule.getAttribute("data-value");
        var rowCounterTrainingModule = 0;
        rowCounterTrainingModule = valueTrainingModule;
        debugger;
        addRowButtonTrainingModule.addEventListener("click", function() {
            debugger;
            var newRow = tableTrainingModule.insertRow();

            if( rowCounterTrainingModule == null || rowCounterTrainingModule == "" ){
                rowCounterTrainingModule = 1;
            }else{
                rowCounterTrainingModule++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="TMid'+rowCounterTrainingModule+'">'+rowCounterTrainingModule+'</p>';
            cell2.innerHTML = '<input type="text" name="TMName[]" placeholder="Enter Training Module Name" class="form-control" oninput="restrictWhiteSpace(this)"  id="TMName' + rowCounterTrainingModule + '">';
            cell3.innerHTML = '<input type="text" name="TMOrginationName[]" placeholder="Enter Origination Name" class="form-control" oninput="restrictWhiteSpace(this)"  id="TMOrginationName' + rowCounterTrainingModule + '">';
            cell4.innerHTML = '<input type="text" name="TMRole[]" placeholder="Enter Role" class="form-control" oninput="restrictWhiteSpace(this)"  id="TMRole' + rowCounterTrainingModule + '">';
            cell5.innerHTML = '<input type="month" name="TMYear[]" placeholder="Enter Year" class="form-control"  oninput="restrictWhiteSpace(this)" id="TMYear' + rowCounterTrainingModule + '">';
            cell6.innerHTML = '<button type="button" class="" onclick="removeRowTrainingModule()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"</i>' +
                '</button>';
        });
        function removeRowTrainingModule() {
            debugger;
            const table = document.getElementById("faqsTrainingModuleDeveloped").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterTrainingModule--;
            }
        }

        //  Article & Research Paper Published

        var tableArticleResearch = document.getElementById("faqsArticleAndResearchPaperPublished").getElementsByTagName('tbody')[0];
        var addRowButtonArticleResearch = document.getElementById("addfaqsArticleResearchPaperPublished");
        var valueArticleResearch = addRowButtonArticleResearch.getAttribute("data-value");
        var rowCounterArticleResearch = 0;
        rowCounterArticleResearch = valueArticleResearch;
        debugger;
        addRowButtonArticleResearch.addEventListener("click", function() {
            debugger;
            var newRow = tableArticleResearch.insertRow();

            if( rowCounterArticleResearch == null || rowCounterArticleResearch == "" ){
                rowCounterArticleResearch = 1;
            }else{
                rowCounterArticleResearch++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            // Set the IDs and content for the cells
            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="ARId'+rowCounterArticleResearch+'">'+rowCounterArticleResearch+'</p>';
            cell2.innerHTML = '<input type="text" name="ARPaper[]" placeholder="Enter paper" class="form-control" oninput="restrictWhiteSpace(this)"  id="ARPaper' + rowCounterArticleResearch + '">';
            cell3.innerHTML = '<input type="text" name="ARPublishedBy[]" placeholder="Enter Published By" class="form-control" oninput="restrictWhiteSpace(this)"  id="ARPublishedBy' + rowCounterArticleResearch + '">';
            cell4.innerHTML = '<input type="text" name="ARLanguage[]" placeholder="Enter Language" class="form-control" oninput="restrictWhiteSpace(this)"  id="ARLanguage' + rowCounterArticleResearch + '">';
            cell5.innerHTML = '<input type="month" name="ARYear[]" placeholder="Enter Year" class="form-control"  oninput="restrictWhiteSpace(this)" id="ARYear' + rowCounterArticleResearch + '">';
            cell6.innerHTML = '<button type="button" class="" onclick="removeRowArticleResearch()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"></i>' +
                '</button>';
        });

        function removeRowArticleResearch() {
            debugger;
            const table = document.getElementById("faqsArticleAndResearchPaperPublished").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterArticleResearch--;
            }
        }

        // Language Proficiency

        var tableLanguageProficiency = document.getElementById("faqsLanguageProficiency").getElementsByTagName('tbody')[0];
        var addRowButtonLanguageProficiency = document.getElementById("addfaqsLanguageProficiency");
        var valueLanguageProficiency = addRowButtonLanguageProficiency.getAttribute("data-value");
        var rowCounterLanguageProficiency = 0;
        rowCounterLanguageProficiency = valueLanguageProficiency;
        debugger;
        addRowButtonLanguageProficiency.addEventListener("click", function() {
            debugger;
            var newRow = tableLanguageProficiency.insertRow();

            if( rowCounterLanguageProficiency == null || rowCounterLanguageProficiency == "" ){
                rowCounterLanguageProficiency = 1;
            }else{
                rowCounterLanguageProficiency++;
            }

            // Create cells for the new row
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            // Set the IDs and content for the cells
            // cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="LPId'+rowCounterLanguageProficiency+'">'+rowCounterLanguageProficiency+'</p>';
            // cell2.innerHTML = '<input type="text" name="LPKnown[]"  class="form-control" oninput="restrictWhiteSpace(this)"  id="LPKnown' + rowCounterLanguageProficiency + '">';
            // cell3.innerHTML = '<input type="text" name="LPRead[]" class="form-control" oninput="restrictWhiteSpace(this)"  id="LPRead' + rowCounterLanguageProficiency + '">';
            // cell4.innerHTML = '<input type="text" name="LPWrite[]"  class="form-control" oninput="restrictWhiteSpace(this)"  id="LPWrite' + rowCounterLanguageProficiency + '">';
            // cell5.innerHTML = '<input type="text" name="LPSpeak[]" class="form-control"  oninput="restrictWhiteSpace(this)" id="LPSpeak' + rowCounterLanguageProficiency + '">';
            // cell6.innerHTML = '<button type="button" class="" onclick="removeRowLanguageProficiency()"> ' +
            //     '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"></i>' +
            //     '</button>';

            cell1.innerHTML =  '<p style="font-size: 2em; padding: 10px 36px;" id="LPId'+rowCounterLanguageProficiency+'">'+rowCounterLanguageProficiency+'</p>';
            cell2.innerHTML = '<select style="width: 100%" name="LPKnown[]" class="QualificationDropDown" id="Qualification">\\n\' +\n' +
                '                \'<option>Select</option> <!-- Default "Select" option -->\\n\' +\n' +
                '                \'    @foreach($LanguageDetails as $item=>$item2)\\n\' +\n' +
                '                \'         <option value ="{{$item2->value}}">{{$item2->text}}</option>\\n\' +\n' +
                '                \'    @endforeach\\n\' +\n' +
                '                \'</select>';
            cell3.innerHTML = '<select style="width: 100%" name="LPRead[]" class="QualificationDropDown" id="Qualification">\n' +
                '     <option>Select</option> <!-- Default "Select" option -->\n' +
                '       @foreach($ChoiceDetails as $item=>$item2)\n' +
                '           <option value ="{{$item2->value}}">{{$item2->text}}</option>\n' +
                '       @endforeach\n' +
                '</select>';
            cell4.innerHTML = '<select style="width: 100%" name="LPWrite[]" class="QualificationDropDown" id="Qualification">\n' +
                ' <option>Select</option> <!-- Default "Select" option -->\n' +
                '    @foreach($ChoiceDetails as $item=>$item2)\n' +
                '       <option value ="{{$item2->value}}">{{$item2->text}}</option>\n' +
                '    @endforeach\n' +
                '</select>';
            cell5.innerHTML = '<select style="width: 100%" name="LPSpeak[]" class="QualificationDropDown" id="Qualification">\n' +
                '  <option>Select</option> <!-- Default "Select" option -->\n' +
                '    @foreach($ChoiceDetails as $item=>$item2)\n' +
                '      <option value ="{{$item2->value}}">{{$item2->text}}</option>\n' +
                '    @endforeach\n' +
                '</select>';
            cell6.innerHTML = '<button type="button" class="" onclick="removeRowLanguageProficiency()"> ' +
                '<i class="fa fa-trash fa-3x" style="padding: 9px 32px; color: Red;"></i>' +
                '</button>';
        });

        function removeRowLanguageProficiency() {
            debugger;
            const table = document.getElementById("faqsLanguageProficiency").getElementsByTagName('tbody')[0];

            if (table.rows.length > 0) {
                table.deleteRow(-1);
                rowCounterLanguageProficiency--;
            }
        }
    </script>

    <script>




    </script>

    <script>

        function totalExp(id) {
            debugger;
            var idnew = id;
            const parts = idnew.split(' ');
            const secondPart = parts[1];
            const date = 'ExpjoiningDate' + secondPart;
            const date2 = 'ExpleavingDate' + secondPart;
            const date3 = 'ExpShowTotalExp ' + secondPart;

            const startDate = new Date(document.getElementById(date).value);
            const endDate = new Date(document.getElementById(date2).value);

            if (isNaN(startDate) || isNaN(endDate)) {
                document.getElementById(date3).value = 'Invalid date';
                return;
            }

            const timeDifference = endDate - startDate;

            if (isNaN(timeDifference)) {
                document.getElementById(date3).value = 'Invalid date';
                return;
            }

            const secondsInAMinute = 60;
            const minutesInAnHour = 60;
            const hoursInADay = 24;
            const millisecondsInASecond = 1000;
            const millisecondsInAMinute = secondsInAMinute * millisecondsInASecond;
            const millisecondsInAnHour = minutesInAnHour * millisecondsInAMinute;
            const millisecondsInADay = hoursInADay * millisecondsInAnHour;
            const millisecondsInAYear = 365 * millisecondsInADay;

            let years = Math.floor(timeDifference / millisecondsInAYear);
            let remainingTime = timeDifference % millisecondsInAYear;
            let months = 0;
            let days = 0;

            // Calculate remaining months and days
            while (remainingTime > 0) {
                if (remainingTime >= millisecondsInADay * 30) {
                    months++;
                    remainingTime -= millisecondsInADay * 30;
                } else {
                    days = Math.floor(remainingTime / millisecondsInADay);
                    remainingTime = remainingTime % millisecondsInADay;
                    break;
                }
            }

            document.getElementById(date3).value = `${years} Year ${months} Month ${days} Days`;
        }




        function totalExpp() {
            debugger;

            const table = document.getElementById('faqsExperience');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {

                const date1Input = rows[i].querySelector('.form-control:nth-child(2)');
                const date2Input = rows[i].querySelector('.form-controln:nth-child(3)');
                const differenceCell = rows[i].querySelector('.ShowTotalExpp');

                const startDate = new Date(date1Input);
                const endDate = new Date(date2Input);

                const timeDifference = endDate - startDate;

                if (isNaN(timeDifference)) {
                    document.getElementById('ShowTotalExpp').value = 'Invalid date';
                    return;
                }


                const secondsInAMinute = 60;
                const minutesInAnHour = 60;
                const hoursInADay = 24;
                const millisecondsInASecond = 1000;
                const millisecondsInAMinute = secondsInAMinute * millisecondsInASecond;
                const millisecondsInAnHour = minutesInAnHour * millisecondsInAMinute;
                const millisecondsInADay = hoursInADay * millisecondsInAnHour;

                const years = Math.floor(timeDifference / millisecondsInADay / 365);
                const months = Math.floor((timeDifference % (millisecondsInADay * 365)) / (millisecondsInADay * 30));
                const days = Math.floor((timeDifference % (millisecondsInADay * 30)) / millisecondsInADay);

                document.getElementById('ShowTotalExpp').value = `${years}Y ${months}M ${days}D`;
            }
        }

        function calculateDateOfBirth() {
            debugger;

            const startDate = new Date(document.getElementById('dateOfBirth').value);
            const endDate = new Date('2023-06-01');

            if (isNaN(startDate.getTime())) {
                document.getElementById('calculateAge').value = 'Invalid date';
                return;
            }

            let years = endDate.getFullYear() - startDate.getFullYear();
            let months = endDate.getMonth() - startDate.getMonth();
            let days = endDate.getDate() - startDate.getDate();

            if (months < 0 || (months === 0 && days < 0)) {
                years--;
                months += 12;
            }

            if (days < 0) {
                const lastDayOfMonth = new Date(endDate.getFullYear(), endDate.getMonth(), 0).getDate();
                days += lastDayOfMonth;
                months--;
            }

            document.getElementById('calculateAge').value = `${years} Year ${months} Month ${days} Days`;
        }


    </script>

    {{--    // Upload Profile Photo--}}

    <script>

        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        const imageUpload = document.getElementById('imageUpload');
        const uploadedImage = document.getElementById('uploadedImage');
        const imageContainer = document.getElementById('imageContainer');
        debugger;
        imageUpload.addEventListener('change', function () {
            const file = imageUpload.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    uploadedImage.src = e.target.result;
                    imageContainer.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                uploadedImage.src = '';
                imageContainer.style.display = 'none';
            }

            var files = $('#imageUpload')[0].files;
            var emailInput = document.getElementsByName("email")[0];
            var emailValue = emailInput.value;

            debugger;
            if (file != null && file != ""){
                var fd = new FormData();

                fd.append('file', files[0]);
                fd.append('emailValue', emailValue);
                fd.append('_token', CSRF_TOKEN);

                // AJAX requestcd..

                $.ajax({
                    url: "{{route('PostProfilePhoto')}}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        debugger;

                        $('#err_file').removeClass('d-block');
                        $('#err_file').addClass('d-none');

                        if (response.success == 1) { // Uploaded successfully

                            // Response message
                            $('#responseMsg').addClass("alert-success");
                            $('#responseMsg').html(response.message);
                            $('#responseMsg').removeClass('d-none');
                            $('#responseMsg').addClass('d-block');
                            $('#responseMsg').show();

                        } else if (response.success == 2) { // File not uploaded

                            // Response message
                            $('#responseMsg').removeClass("alert-success");
                            $('#responseMsg').addClass("alert-danger");
                            $('#responseMsg').html(response.message);
                            $('#responseMsg').show();
                        } else {
                            // Display Error
                            $('#err_file').text(response.error);
                            $('#err_file').removeClass('d-none');
                            $('#err_file').addClass('d-block');
                        }
                    }
                });
            }

        });
    </script>

    {{--    Upload Signature Photo--}}

    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        const signatureUpload = document.getElementById('signatureUpload');
        const uploadedSignature = document.getElementById('uploadedSignature');
        const SignatureContainer = document.getElementById('SignatureContainer');
        debugger;
        signatureUpload.addEventListener('change', function () {
            const file = signatureUpload.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    uploadedSignature.src = e.target.result;
                    SignatureContainer.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                uploadedSignature.src = '';
                SignatureContainer.style.display = 'none';
            }

            var files = $('#signatureUpload')[0].files;
            var emailInput = document.getElementsByName("email")[0];
            var emailValue = emailInput.value;
            debugger;

            if (files != null && files != "") {
                debugger;
                var fd = new FormData();

                fd.append('file', files[0]);
                fd.append('emailValue', emailValue);
                fd.append('_token', CSRF_TOKEN);

                // AJAX requestcd..

                $.ajax({
                    url: "{{route('PostProfileSignature')}}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        debugger;

                        $('#err_fileSign').removeClass('d-block');
                        $('#err_fileSign').addClass('d-none');

                        if (response.success == 1) { // Uploaded successfully

                            // Response message
                            $('#responseMsgSign').addClass("alert-success");
                            $('#responseMsgSign').html(response.message);
                            $('#responseMsgSign').removeClass('d-none');
                            $('#responseMsgSign').addClass('d-block');
                            $('#responseMsgSign').show();

                        } else if (response.success == 2) { // File not uploaded

                            // Response message
                            $('#responseMsgSign').removeClass("alert-success");
                            $('#responseMsgSign').addClass("alert-danger");
                            $('#responseMsgSign').html(response.message);
                            $('#responseMsgSign').show();
                        } else {
                            // Display Error
                            $('#err_fileSign').text(response.error);
                            $('#err_fileSign').removeClass('d-none');
                            $('#err_fileSign').addClass('d-block');
                        }
                    }
                });
            }
        });
    </script>

@endsection


