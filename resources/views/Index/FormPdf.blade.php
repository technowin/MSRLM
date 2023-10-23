<style>
    .table-bordered {
        border: 1px solid #000;
        word-wrap: break-word;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #000;
        word-wrap: break-word;
        padding: 8px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
        word-wrap: break-word;
    }


</style>



<div class="col-md-6" style="text-align: center; margin-bottom: 5px;">
    <h2 style="font-size: 15px;">Personal Information:</h2>
</div>
{{--<table style="width: 100%">--}}
{{--    <tr>--}}
{{--        <th style="text-align: left">--}}
{{--            FirstName--}}
{{--        </th>--}}
{{--        <td>--}}
{{--            {{$FirstName}}--}}
{{--        </td>--}}
{{--        <th>--}}
{{--            MiddleName--}}
{{--        </th>--}}
{{--        <td>--}}
{{--            {{$MiddleName}}--}}
{{--        </td>--}}
{{--        <th>--}}
{{--            MiddleName--}}
{{--        </th>--}}
{{--        <td>--}}
{{--            {{$MiddleName}}--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}

<div class="col-md-12 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-2 required" style="font-weight: bold;"><label class="fieldlabels" style="font-size: 16px;">First Name:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="FirstName" placeholder="Enter First Name" value="{{$FirstName}}" id="FirstName" onkeypress="return AvoidSpace(event)" readonly style="width: 100%; font-size: 16px;">
    </div>
    <div class="col-md-2 required" style="font-weight: bold;"><label class="fieldlabels" style="font-size: 16px;">Middle Name:</label></div>
    <div class="col-md-2">
        <input type="text" name="MiddleName" placeholder="Enter Middle Name" value="{{$MiddleName}}" id="MiddleName" onkeypress="return AvoidSpace(event)" readonly style="width: 100%; font-size: 16px;">
    </div>

    <div class="col-md-4 required" style="font-weight: bold;"><label class="fieldlabels" style="font-size: 16px;">Last Name:</label></div>
    <div class="col-md-7">
        <input type="text" name="LastName" placeholder="Enter Last Name" value="{{$LastName}}" id="LastName" onkeypress="return AvoidSpace(event)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}

{{--</div>--}}

{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" style="font-weight: bold;"><label class="fieldlabels" style="font-size: 16px;">Last Name:</label></div>--}}
{{--    <div class="col-md-7">--}}
{{--        <input type="text" name="LastName" placeholder="Enter Last Name" value="{{$LastName}}" id="LastName" onkeypress="return AvoidSpace(event)" readonly style="width: 100%; font-size: 16px;">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" ><label class="fieldlabels" style="font-size: 16px;"><b>Email ID: &nbsp;&nbsp;&nbsp;&nbsp;</b>  {{$emailId}}</label></div>--}}
{{--    <div class="col-md-7">--}}
{{--        {{$emailId}}--}}
{{--        <input type="email" name="email" placeholder="Enter Email ID" value="{{$emailId}}" id="email" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" ><label class="fieldlabels" style="font-size: 16px;"><b>Mobile No:</b> &nbsp;&nbsp;&nbsp;&nbsp;  {{$mobileNo}}</label></div>--}}
{{--    <div class="col-md-7">--}}
{{--        <input type="text" name="Mobile" placeholder="Enter Mobile No" id="Mobile" value="{{$mobileNo}}" oninput="MobileNumberOnly(this)" maxlength="10" readonly style="width: 100%; font-size: 16px;">--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" >--}}
{{--        <label class="fieldlabels" style="font-size: 16px;"><b>Category:</b> &nbsp;&nbsp;&nbsp;&nbsp;  {{$Category}}</label>--}}
{{--    </div>--}}
{{--    <div class="col-md-7">--}}
{{--        <select style="width: 100%; font-size: 16px;" name="Qualification" class="QualificationDropDown" id="categories" disabled readonly="">--}}
{{--            <option>Select</option> <!-- Default "Select" option -->--}}
{{--            @foreach($CategoryDetails as $item2)--}}
{{--                <option value="{{$item2->value}}" @if($item2->value == $Category) selected @endif>{{$item2->text}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}

<table style="padding-right: 50px; padding-bottom: 5px">
    <tr>
        <th>
            <b>Email ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        </th>
        <td>
            {{$emailId}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>

        <th>
            <b>Mobile No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        </th>
        <td>
            {{$mobileNo}}
        </td>
    </tr>
    <tr>

        <th>
            <b>Category: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        </th>

        <td>
            {{$Category}}
        </td>
    </tr>
    <tr>
        <th>
            <b>Date of Birth: &nbsp;</b>
        </th>
        <td>
            {{$DateOfBirth}}
        </td>
    </tr>
</table>



{{--<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" style="font-weight: bold;">--}}
{{--        <label class="fieldlabels" style="font-size: 16px;">Date of Birth:  {{$DateOfBirth}}</label>--}}
{{--    </div>--}}
{{--    <div class="col-md-7">--}}

{{--        <input type="date" value="{{$DateOfBirth}}" style="width: 100%; font-size: 16px;" readonly/>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="col-md-6 mb-4 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Age on 01/06/2023 (years, months, and days):</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$Age}}" style="width: 100%; font-size: 16px;" readonly/>
    </div>
</div>

<div class="col-md-6 mb-4 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Aadhar Card:</label>
    </div>
    <div class="col-md-7">
        <input type="text" id="aadharInput" value="{{$aadharInput}}" maxlength="14" oninput="handleInputAadhar(event)" style="width: 100%; font-size: 16px;" disabled><br>
        <span class="AadharNo"></span>
    </div>
</div>

<div class="col-md-6 mb-4 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Pan Card:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$pancardNo}}" style="width: 100%; font-size: 16px;" readonly/>
    </div>
</div>

<div class="row" style="display: flex; flex-wrap: wrap;">

    <div class="col-md-6 mb-2" style="display: flex; justify-content: center;">
        <div style="margin-top: 40px;">

            @if($ProfilePhotoToShow == null || $ProfilePhotoToShow == "")
                <img id="uploadedImage" style="width: 150px; height: 120px; border: solid; padding-left:50px " src="">
            @else
                <img id="uploadedImage" style="width: 150px; height: 120px; border: solid;" src="{{$ProfilePhotoToShow}}">
            @endif
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-md-6 mb-2" style="display: flex; justify-content: center;">--}}
{{--        <div style="margin: 20px;">--}}
            @if($ProfileSignatureToShow == null || $ProfileSignatureToShow == "")
                <img id="uploadedSignature" style="width: 150px; height: 120px; border: solid;" src="">
            @else
                <img id="uploadedSignature" style="width: 150px; height: 120px; border: solid;" src="{{$ProfileSignatureToShow}}">
            @endif
        </div>
    </div>

    <div class="col-md-6 mb-2" style="display: flex; align-items: center;">
        <div class="col-md-5 required" style="display: flex; align-items: center;">
            <label class="fieldlabels" style="font-weight: bold">Domicile Of Maharashtra: &nbsp;&nbsp;&nbsp;&nbsp;</label>

        @if($Domicile == 'Yes')
{{--            <div class="col-md-7" style="display: flex; align-items: center;">--}}
                <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle; padding-left: 45px" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
{{--            </div>--}}
        @elseif($Domicile == 'No')
{{--            <div class="col-md-7" style="display: flex; align-items: center;">--}}
                <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle; padding-left: 45px" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
{{--            </div>--}}
        @else
{{--            <div class="col-md-7" style="display: flex; align-items: center;">--}}
                <input id="DOM1" type="radio" class="DOM" name="DOM1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="DOM2" type="radio" name="DOM1" class="DOM" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="">
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
{{--            </div>--}}
        @endif
        </div>
    </div>
</div>

<div class="row" style="display: flex; flex-wrap: wrap;">
    <div class="col-md-6 mb-4" style="display: flex; align-items: center;">
        <div class="col-md-5 required">
            <label class="fieldlabels" style="font-weight: bold">
                Are You From Handicap Category:
            </label>
{{--        </div>--}}
{{--        <div class="col-md-7 row ml-2" style="display: flex; align-items: center;">--}}
            @if( $Handicap == 'Yes' )
                <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('1', this); return false;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
            @elseif( $Handicap == 'NO' )
                <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('1', this); return false;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="AYFHC2" type="radio" name="AYFHC1" class ="AYFHC" value="NO" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
            @else
                <input id="AYFHC1" type="radio" class="AYFHC" name="AYFHC1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('1', this); return false;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Yes</b></label>

                <input id="AYFHC2" type="radio" name="AYFHC1" class="AYFHC" value="NO" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" onchange="showStuff('0', this); return false;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>No</b></label>
            @endif
{{--        </div>--}}
    </div>
    </div>
    <br>

    <div class="col-md-6 mb-2 row" style="display: flex; justify-content: space-between;">
        @if( $Handicap == 'Yes' )
            <div class="col-md-6 mb-4 row" style="margin-bottom: 10px;" id="HandicapType">
                <div class="col-md-4 required" style="font-weight: bold;">
                    <label class="fieldlabels" style="font-size: 16px;">If Yes, Handicap Type: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" style="width: 100%; font-size: 16px;" readonly />
                </div>
            </div>





            <div class="col-md-6 mb-4 row" style="margin-bottom: 10px;" id="perOfHandicap">
                <div class="col-md-4 required" style="font-weight: bold;">
                    <label class="fieldlabels" style="font-size: 16px;">Percentage Of Handicap: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" style="width: 100%; font-size: 16px;" readonly />
                </div>
            </div>




        @elseif( $Handicap == 'NO' )
            <div class="col-md-6" style="display: none;" id="HandicapType">
                <div class="col-md-4 required">
                    <label class="fieldlabels">If Yes, Handicap Type: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" readonly />
                </div>
            </div>

            <div class="col-md-6" style="display: none;" id="perOfHandicap">
                <div class="col-md-4 required">
                    <label class="fieldlabels">Percentage Of Handicap: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" readonly />
                </div>
            </div>
        @else
            <div class="col-md-6" style="display: none;" id="HandicapType">
                <div class="col-md-4 required">
                    <label class="fieldlabels">If Yes, Handicap Type: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$TypeOfHandicap}}" id="HandicapTypeHere" placeholder="Enter Type Of Handicap" readonly />
                </div>
            </div>

            <div class="col-md-6" style="display: none;" id="perOfHandicap">
                <div class="col-md-4 required">
                    <label class="fieldlabels">Percentage Of Handicap: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$PercentageOfHandicap}}" id="PerceentOfHandicap" placeholder="Enter Per Of Handicap" readonly />
                </div>
            </div>
        @endif
    </div>
</div>


<div class="row" style="display: flex; flex-wrap: wrap;">
    <div class="col-md-6 mb-2" style="display: flex; align-items: center;">
        <div class="col-md-5 required">
            <label class="fieldlabels">
                <b>Sex:  </b>
            </label>
{{--        </div>--}}
{{--        <div class="col-md-7 row ml-2" style="display: flex; align-items: center;">--}}
            @if( $Sex == 'Male' )
                <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male" style="height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Male</b></label>

                <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Female</b></label>
            @elseif( $Sex == 'Female' )
                <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male" style="height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Male</b></label>

                <input id="Sex2" type="radio" name="Sex1" class="Sex" value="Female" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Female</b></label>
            @else
                <input id="Sex1" type="radio" class="Sex" name="Sex1" value="Male" style="height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Male</b></label>

                <input id="Sex2" type="radio" class="Sex" name="Sex1" value="Female" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Female</b></label>
            @endif
{{--        </div>--}}
    </div>
    </div>
</div>

<div class="row" style="display: flex; flex-wrap: wrap;">
    <div class="col-md-6 mb-2" style="display: flex; align-items: center;">
        <div class="col-md-4 required">
            <label class="fieldlabels">
                <b>Married Status:</b>
            </label>
{{--        </div>--}}
{{--        <div class="col-md-8 row ml-2" style="display: flex; align-items: center;">--}}
            @if( $MarriedStatus == 'Married' )
                <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married" style="height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Married</b></label>

                <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Not Married</b></label>
            @elseif( $MarriedStatus == 'Not Married' )
                <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married" style="height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Married</b></label>

                <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
                <label class="td1" style="margin-left: 15px;"><b>Not Married</b></label>
            @else
                <input id="MS1" type="radio" class="MSrad" name="MS1" value="Married" style="height: 25px; width: 25px; vertical-align: middle;" disabled>
                <label class="td1" style="margin-left: 15px;"><b>Married</b></label>

                <input id="MS2" type="radio" name="MS1" class="MSrad" value="Not Married" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">
                <label class="td1" style="margin-left: 15px;"><b>Not Married</b></label>
            @endif
{{--        </div>--}}
    </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label class="fieldlabelss" style="font-weight: bold">Residential Address (Current Address)</label>
    </div>
</div>

<div class="col-md-6 mb-2 row">
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Building Name:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurBuildingName}}" placeholder="Enter Building Name" id="buildingName" oninput="restrictWhiteSpace(this)" readonly="readonly" style="width: 100%; font-size: 16px;">
    </div>
</div>

{{--<div class="col-md-6 mb-4 row" style="margin-bottom: 10px;">--}}
{{--    <div class="col-md-4 required" style="font-weight: bold;">--}}
{{--        <label class="fieldlabels" style="font-size: 16px;">Aadhar Card:</label>--}}
{{--    </div>--}}
{{--    <div class="col-md-7">--}}
{{--        <input type="text" id="aadharInput" value="{{$aadharInput}}" maxlength="14" oninput="handleInputAadhar(event)" style="width: 100%; font-size: 16px;" disabled><br>--}}
{{--        <span class="AadharNo"></span>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Street Name, Area Locality:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurStreetName}}" placeholder="Enter Street Name" id="streetName" oninput="restrictWhiteSpace(this)" readonly="readonly" style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">City:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurCity}}" placeholder="Enter City" id="city" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">State:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurState}}" placeholder="Enter State" id="state" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">District:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurDistrict}}" placeholder="Enter District" id="district" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Landmark:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurLandmark}}" placeholder="Enter Landmark" id="landmark" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">PinCode:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$CurPincode}}" placeholder="Enter PinCode" id="pincode" maxlength="6" oninput="MobileNumberOnly(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row">
</div>
<br>


{{--<div class="col-md-6 mb-2 row">--}}
{{--    <input type="checkbox" id="SameAs" name="SameAs" value="Boat" style="margin-top: 14px; margin-left: 50px; height: 25px; width: 25px; vertical-align: middle;" disabled="disabled">--}}
{{--    <label for="SameAs" style="margin-left: 10px; font-weight: bold; font-size: 15px; margin-top: 15px; vertical-align: middle;">Same As Current Address</label><br><br>--}}
{{--</div>--}}

<div class="row">
    <div class="col-md-6">
        <label class="fieldlabelss" style="font-weight: bold">Permanent Address</label>
    </div>
</div>

<div class="col-md-6 mb-2 row">
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Building Name:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerBuildingName}}" placeholder="Enter Building Name" id="perBuildingName" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Street Name, Area Locality:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerStreetName}}" placeholder="Enter Street Name" id="perStreetName" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">City:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerCity}}" placeholder="Enter City" id="perCity" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">State:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerState}}" placeholder="Enter State" id="perState" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">District:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerDistrict}}" placeholder="Enter District" id="perDistrict" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">Landmark:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerLandmark}}" placeholder="Enter Landmark" id="perLandmark" oninput="restrictWhiteSpace(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>

<div class="col-md-6 mb-2 row" style="margin-bottom: 10px;">
    <div class="col-md-4 required" style="font-weight: bold;">
        <label class="fieldlabels" style="font-size: 16px;">PinCode:</label>
    </div>
    <div class="col-md-7">
        <input type="text" value="{{$PerPincode}}" placeholder="Enter PinCode" id="perPincode" maxlength="6" oninput="MobileNumberOnly(this)" readonly style="width: 100%; font-size: 16px;">
    </div>
</div>



{{--educational--}}
<div class="col-md-6" style="text-align: center;">
    <h2 style="font-size: 15px;">Educational Information:</h2>
</div>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">Educational Details (From S.S.C Onwards)</h4>



                        @if(count($EducationalDetailsToShow) > 0)
                        <div class="table-responsive">

                            <table id="faqsEducational" class="table table-bordered table-striped" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word; font-size: 12px ">
                                <thead>
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Sr. No</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Qualification</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Stream (BE IT/Science/Comps)</th>
                                    <th style="border: 1px solid #000; padding: 8px;">College / Institute / University / Board</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Mark %</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Year Of Passing</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Subject / Specialization</th>

                                </tr>
{{--                                <tr>--}}

{{--                                    <th style="border: 1px solid #000; padding: 8px;">Mark %</th>--}}
{{--                                    <th style="border: 1px solid #000; padding: 8px;">Year Of Passing</th>--}}
{{--                                    <th style="border: 1px solid #000; padding: 8px;">Subject / Specialization</th>--}}
{{--                                </tr>--}}
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach($EducationalDetailsToShow as $item)
                                    <tr style="word-wrap: break-word">
                                        <td style="border: 1px solid #000; padding: 8px; text-align: center">{{$item->SrNo}}</td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center "> {{$item->Qualification}}</h4>


                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item->STREAM}}</h4>
{{--                                            <input type="text" name="" class="" oninput="restrictWhiteSpace(this)" value="{{ $item->STREAM }}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item->CollegeName}}</h4>
{{--                                            <input type="text" name="CollegeName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item->CollegeName}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item->Mark}}</h4>
{{--                                            <input type="text" name="Percentage[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item->Mark}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item->YearOfPassing}}</h4>
{{--                                            <input type="month" name="year[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item->YearOfPassing}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item->Subjects}}</h4>
{{--                                            <input type="text"  oninput="restrictWhiteSpace(this)" value="{{$item->Subjects}}" readonly>--}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                        </div>
                        @else
                            <p>No EDducational Data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">Other professional qualification / Certifications / Computer education details </h4>
                        @if(count($professionalDetailsToShow)> 0 )

                        <div class="table-responsive">
                            <table id="faqsOther" class="table table-bordered table-striped" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Sr. No.</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Other Certifications</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Board / Organization</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Year Of Passing</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Percentage / Grade</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach($professionalDetailsToShow as $item1)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 8px;"><h4 style="text-align:center ">{{$item1->ProfessionalSrNo}}</h4></td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item1->OtherCertification}}</h4>
{{--                                            <input type="text" name="otherCerti[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1->OtherCertification}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item1->BoardOrganization}}</h4>
                                            {{--<input type="text" name="otherOrg[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1->BoardOrganization}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item1->YearOfPassing}}</h4>
{{--                                            <input type="month" name="otherYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1->YearOfPassing}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item1->Percentage}}</h4>
{{--                                            <input type="text" name="otherPerc[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item1->Percentage}}" readonly>--}}
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>




                        </div>
                            @else
                            <p>No professional qualification / Certifications / Computer education details Data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--Professional Details:--}}
<div class="col-md-6" style="text-align: center; ">
    <h2 style="font-size: 15px;">Professional Details:</h2>
</div>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">1. Experience Details (Chronological Order)</h4>
                        @if(count($ExperienceDetailsToShow)>0)

                        <div class="table-responsive">
                            <table id="faqsExperience" class="table table-bordered table-striped" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Sr. No</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Name Of Organization</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Joining Date</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Leaving Date</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Total Experience</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Position Held</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Role / Nature Of Cuties</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach($ExperienceDetailsToShow as $item2)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 8px;"><h4 style="text-align:center ">{{$item2->ExperienceSrNo}}</h4></td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item2->NameOfOrganization}}</h4>
{{--                                            <input type="text" name="ExpOrg[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->NameOfOrganization}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item2->JoiningDate}}</h4>
{{--                                            <input type="date" name="ExpJoining[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->JoiningDate}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item2->LeavingDate}}</h4>
{{--                                            <input type="date" name="ExpLeaving[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->LeavingDate}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px; word-wrap: break-word">
                                            <h4 style="text-align:center ">{{$item2->TotalExperience}}</h4>
{{--                                            <input type="text" name="ExpTotal[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->TotalExperience}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item2->PositionHeld}}</h4>
{{--                                            <input type="text" name="ExpPosition[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->PositionHeld}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item2->RoleOfDuties}}</h4>
{{--                                            <input type="text" name="ExpRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item2->RoleOfDuties}}" readonly>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        @else
                            <p>No Experience Details </p>
                            @endif
                        <BR>

                        <div class="text-center">
{{--                            <h4 style="text-align:center ">{{$TotalExperienceStepThree}}</h4>--}}
                            <input type="text" id="totalExperience" style="font-size:13px;font-weight: bold " value="{{$TotalExperienceStepThree}}" placeholder="Total Experience" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">2. Workshop & Trainings Attended</h4>
                        @if(count($WorkshopDetailsToShow)>0)

                        <div class="table-responsive">

                            <table id="faqsWorkshop" class="table table-bordered table-striped" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Sr. No</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Name Of The Training Program</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Conducted By (Organization Name)</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Duration (Days)</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Year</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach($WorkshopDetailsToShow as $item3)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 8px;"><h4 style="text-align:center ">{{$item3->WorkshopSrNo}}</h4></td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item3->NameOfProgram}}</h4>
{{--                                            <input type="text" name="WorkshopTrainingP[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3->NameOfProgram}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item3->ConductedBy}}</h4>
{{--                                            <input type="text" name="workshopOri[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3->ConductedBy}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item3->DuraionDays}}</h4>
{{--                                            <input type="number" name="workshopDura[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3->DuraionDays}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item3->WorkshopYear}}</h4>
{{--                                            <input type="month" name="WorkshopYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item3->WorkshopYear}}" readonly>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            @else
                        <p>No Workshop & Trainings Attended</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">3. Training Conducted as Master Trainer / Resource Person</h4>
                        @if(count($TrainingConductedDetailsToShow)>0)

                        <div class="table-responsive">
                            <table id="faqsTrainingConducted" class="table table-bordered table-striped" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Sr. No</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Training Conducted As</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Training Conducted By (Organization Name)</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Name Of Training Program</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Subject You Taken</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Duration Of Training Program</th>
                                    <th style="border: 1px solid #000; padding: 8px;">In Which Year Training Conducted</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Number Of Participants Participated</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Venue Of Training Program</th>

                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach($TrainingConductedDetailsToShow as $item4)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 8px;">{{$item4->TCSrNo}}</td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->ConductedAsRole}}</h4>
{{--                                            <select style="width: 100%" name="TrainingsConductedAS[]"  id="Qualification" disabled readonly>--}}
{{--                                                <option>Select</option> <!-- Default "Select" option -->--}}
{{--                                                @foreach($TrainingConducted as $item1)--}}
{{--                                                    <option value="{{$item1->value}}" @if($item1->value == $item4->ConductedAsRole) selected @endif>{{$item1->text}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->ConductedBy}}</h4>
{{--                                            <input type="text" name="TCOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->ConductedBy}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->NameOfProgram}}</h4>
{{--                                            <input type="text" name="TCTrainingProgram[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->NameOfProgram}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->Subjects}}</h4>
{{--                                            <input type="text" name="TCSubject[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->Subjects}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->DurationOfProgram}}</h4>
{{--                                            <input type="text" name="TCDurationOfTP[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->DurationOfProgram}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->TrainingConductedYear}}</h4>
{{--                                            <input type="month" name="TCYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->TrainingConductedYear}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->ParticipantsParticipated}}</h4>
{{--                                            <input type="number" name="TCParticipant[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->ParticipantsParticipated}}" readonly>--}}
                                        </td>
                                        <td style="border: 1px solid #000; padding: 8px;">
                                            <h4 style="text-align:center ">{{$item4->ProgramVenue}}</h4>
{{--                                            <input type="text" name="TCVenue[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->ProgramVenue}}" readonly>--}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                            @else
                            <p> No Training Conducted as Master Trainer / Resource Person</p>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">4. Training Module Developed</h4>
                        @if(count($TrainingModuleDetailsToShow)>0)

                        <div class="table-responsive">
                            <table id="faqsTrainingModuleDeveloped" class="table table-bordered" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name Of Training Module</th>
                                    <th>Developed For ( Origination Name )</th>
                                    <th>Your Role In Module Development</th>
                                    <th>Year</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach( $TrainingModuleDetailsToShow as $item4 )
                                    <tr>
                                        <td style="font-size: 1em; padding: 18px 36px;"><h4 style="text-align:center ">{{$item4->TrainingModuleSrNo}}</h4></td>
                                        <td>
                                            <h4 style="text-align:center ">{{ $item4->NameOfModule }}</h4>
{{--                                            <input type="text" name="TMName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{ $item4->NameOfModule }}" readonly>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item4->DevelopedFor}}</h4>
{{--                                            <input type="text" name="TMOrginationName[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->DevelopedFor}}" readonly>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item4->RoleInModule}}</h4>
{{--                                            <input type="text" name="TMRole[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->RoleInModule}}" readonly>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item4->TMYear}}</h4>
{{--                                            <input type="month" name="TMYear[]" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item4->TMYear}}" readonly>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            @else<p>No Training Module Developed</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">5. Article & Research Paper Published</h4>
                        @if(count($ArticleResearchDetailsToShow)>0)

                        <div class="table-responsive">
                            <table id="faqsArticleAndResearchPaperPublished" class="table table-bordered" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Article & Research Paper</th>
                                    <th>Published By ( Origination/Paper/Journal Name )</th>
                                    <th>Language ( Marathi/Hindi/English )</th>
                                    <th>Year Of Publication</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach( $ArticleResearchDetailsToShow as $item5 )
                                    <tr>
                                        <td style="font-size: 1em; padding: 18px 36px;"><h4 style="text-align:center ">{{$item5->ArticleSrNo}} </h4></td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item5->ArticlePaper}}</h4>
{{--                                            <input type="text" name="ARPaper[]" placeholder="Enter paper" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5->ArticlePaper}}" readonly> --}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item5->PublishedBy}}</h4>
{{--                                            <input type="text" name="ARPublishedBy[]" placeholder="Enter published by" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5->PublishedBy}}" readonly>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item5->ArticleLanguage}}</h4>
{{--                                            <input type="text" name="ARLanguage[]" placeholder="Enter language" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5->ArticleLanguage}}" readonly>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item5->YearOfPublication}}</h4>
{{--                                            <input type="month" name="ARYear[]" placeholder="Enter year" class="form-control" oninput="restrictWhiteSpace(this)" value="{{$item5->YearOfPublication}}" readonly>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            @else
                        <p> No Article & Research Paper Published</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-md-6 mb-2 row">
    <div class="col-md-5 required">
        <label class="fieldlabels">
            <b>Knowledge Of MS Office:</b>
        </label>
{{--    </div>--}}
    @if( $KnowOfMSOffice == 'Yes' )
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" disabled checked>
            <label class="td1"><b>Yes</b></label>

            <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled>
            <label class="td1"><b>No</b></label>
{{--        </div>--}}



    @elseif( $KnowOfMSOffice == 'No' )
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;" disabled>
            <label class="td1"><b>Yes</b></label>

            <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;" disabled checked>
            <label class="td1"><b>No</b></label>
{{--        </div>--}}
    @else
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="KOMO1" type="radio" class="KOMO" name="KOMO1" value="Yes" style="height: 25px; width: 25px; vertical-align: middle;">
            <label class="td1"><b>Yes</b></label>

            <input id="KOMO2" type="radio" name="KOMO1" class="KOMO" value="No" style="margin-left: 25px; height: 25px; width: 25px; vertical-align: middle;">
            <label class="td1"><b>No</b></label>
{{--        </div>--}}
    @endif
    </div>
</div>

<div class="col-md-6 mb-2 row">
    <div class="col-md-4">
        <label class="fieldlabels"><B>Presentation Skill:</B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$PresentationSkill}}</label>
    </div>
{{--    <div class="col-md-7">--}}
{{--        <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="PresentationSkill" disabled>--}}
{{--            <option>Select</option> <!-- Default "Select" option -->--}}
{{--            @foreach($SkillRemarks as $item => $item2)--}}
{{--                <option value="{{$item2->value}}"--}}
{{--                        @if($item2->value == $PresentationSkill) selected @endif>{{$item2->text}}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
</div>

<div class="col-md-6 mb-2 row">
    <div class="col-md-4">
        <label class="fieldlabels"><B>Communication Skill:</B> &nbsp;&nbsp;&nbsp;&nbsp;{{$CommunicationSkill}}</label>
    </div>
{{--    <div class="col-md-7">--}}
{{--        <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CommunicationSkill" disabled>--}}
{{--            <option>Select</option> <!-- Default "Select" option -->--}}
{{--            @foreach($SkillRemarks as $item => $item2)--}}
{{--                <option value="{{$item2->value}}"--}}
{{--                        @if($item2->value == $CommunicationSkill) selected @endif>{{$item2->text}}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
</div>

<div class="col-md-6 mb-2 row">
    <div class="col-md-4">
        <label class="fieldlabels" ><B>Co-ordination Skill:</B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$CoordinationSkill}}</label>
    </div>
{{--    <div class="col-md-7">--}}
{{--        <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="CoordinationSkill" disabled>--}}
{{--            <option>Select</option> <!-- Default "Select" option -->--}}
{{--            @foreach($SkillRemarks as $item => $item2)--}}
{{--                <option value="{{$item2->value}}"--}}
{{--                        @if($item2->value == $CoordinationSkill) selected @endif>{{$item2->text}}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
</div>

<div class="col-md-6 mb-2 row">
    <div class="col-md-4">
        <label class="fieldlabels"><B>Writing Skill:</B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$WritingSkill}} </label>
    </div>
{{--    <div class="col-md-7">--}}
{{--        <select style="width: 100%" name="Qualification" class="QualificationDropDown" id="WritingSkill" disabled>--}}
{{--            <option>Select</option> <!-- Default "Select" option -->--}}
{{--            @foreach($SkillRemarks as $item => $item2)--}}
{{--                <option value="{{$item2->value}}"--}}
{{--                        @if($item2->value == $WritingSkill) selected @endif>{{$item2->text}}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
</div>


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="cardForEducation">
                    <div class="card-body">
                        <h4 class="card-title text-center">6. Language Proficiency</h4>
                        @if(count($LanguageProficiencyDetailsToShow)>0)

                        <div class="table-responsive">
                            <table id="faqsLanguageProficiency" class="table table-bordered" style="border-collapse: collapse; width: 100%; table-layout: fixed; word-wrap: break-word">
                                <thead style="font-size: 12px">
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Language Known</th>
                                    <th>Read ( Yes/No )</th>
                                    <th>Write ( Yes/No )</th>
                                    <th>Speak ( Yes/No )</th>
                                </tr>
                                </thead>
                                <tbody style="border: 1px solid #000; padding: 8px; font-size: 12px; word-wrap: break-word;">
                                @foreach( $LanguageProficiencyDetailsToShow as $item6 )
                                    <tr>
                                        <td style="font-size: 1em; padding: 18px 36px;">{{$item6->LanguageSrNo}}</td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item6->LanguagesKnown}}</h4>
{{--                                            <select style="width: 100%" name="LPKnown[]" class="QualificationDropDown" id="LPKnown" disabled readonly="">--}}
{{--                                                <option>Select</option> <!-- Default "Select" option -->--}}
{{--                                                @foreach($LanguageDetails as $item=>$item2)--}}
{{--                                                    <option value="{{$item2->value}}" @if($item2->value == $item6->LanguagesKnown) selected @endif>{{$item2->text}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item6->Read}}</h4>
{{--                                            <select style="width: 100%" name="LPRead[]" class="QualificationDropDown" id="LPRead" disabled readonly="">--}}
{{--                                                <option>Select</option> <!-- Default "Select" option -->--}}
{{--                                                @foreach($ChoiceDetails as $item=>$item2)--}}
{{--                                                    <option value="{{$item2->value}}" @if($item2->value == $item6->Read) selected @endif>{{$item2->text}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item6->Write}}</h4>
{{--                                            <select style="width: 100%" name="LPWrite[]" class="QualificationDropDown" id="LPWrite" disabled readonly="">--}}
{{--                                                <option>Select</option> <!-- Default "Select" option -->--}}
{{--                                                @foreach($ChoiceDetails as $item=>$item2)--}}
{{--                                                    <option value="{{$item2->value}}" @if($item2->value == $item6->Write) selected @endif>{{$item2->text}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </td>
                                        <td>
                                            <h4 style="text-align:center ">{{$item6->Speak}}</h4>
{{--                                            <select style="width: 100%" name="LPSpeak[]" class="QualificationDropDown" id="LPSpeak" disabled readonly="">--}}
{{--                                                <option>Select</option> <!-- Default "Select" option -->--}}
{{--                                                @foreach($ChoiceDetails as $item=>$item2)--}}
{{--                                                    <option value="{{$item2->value}}" @if($item2->value == $item6->Speak) selected @endif>{{$item2->text}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            @else
                        <p>No Language Proficiency</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="col-md-6 mb-2 row">
    <div class="col-md-5 required">
        <label class="fieldlabels" style="font-weight: bold">
            Currently You Are Working Full Time :
        </label>
{{--    </div>--}}
    @if( $CurrentlyWorking == 'Yes' )
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes" disabled checked>
            <label class="td1"><b>Yes</b></label>

            <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No" disabled>
            <label class="td1"><b>No</b></label>
{{--        </div>--}}
    @elseif( $CurrentlyWorking == 'No' )
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes" disabled>
            <label class="td1"><b>Yes</b></label>

            <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No" disabled checked>
            <label class="td1"><b>No</b></label>
{{--        </div>--}}
    @else
{{--        <div class="col-md-6 row ml-2">--}}
            <input id="CYAWFT1" type="radio" class="CYAWFT" name="CYAWFT1" value="Yes">
            <label class="td1"><b>Yes</b></label>

            <input id="CYAWFT2" type="radio" name="CYAWFT1" class="CYAWFT" value="No">
            <label class="td1"><b>No</b></label>
{{--        </div>--}}
    @endif
    </div>
</div>



<br>
<div class="col-md-12 mb-2 row">
    <div class="col-md-4 ">
        <label class="fieldlabels" style="font-weight: bold"><l>Declaration:</l></label>

    </div><br>

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





























