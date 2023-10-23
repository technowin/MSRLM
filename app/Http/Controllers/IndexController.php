<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use function Psy\debug;
use PDF;

class IndexController extends Controller
{

    private $dbConnection;

    public function getDBName()
    {
        return $this->dbConnection = session()->get('Database');
    }

    public Function Index()
    {
        try{
            $emailId = session()->get('EmailId');
            $CategoryDetails = DB::connection($this->getDBName())->select('CALL `stp_getCategoryDetails`');
            $EducationDetails = DB::connection($this->getDBName())->select('CALL `stp_getEducationDetails`');
            $TrainingConducted = DB::connection($this->getDBName())->select('CALL `stp_getTrainingConducted`');
            $LanguageDetails = DB::connection($this->getDBName())->select('CALL `stp_getLanguageDetails`');
            $ChoiceDetails = DB::connection($this->getDBName())->select('CALL `stp_getChoiceYesOrNo`');
            $TypesOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getTypesOfHandicap`');
            $PerOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getPerOfHandicap`');
            $SkillRemarks = DB::connection($this->getDBName())->select('CALL `stp_getSkillRemarks`');

            $personalDetails =  DB::connection($this->getDBName())->select('CALL `stp_getDetailsToShowOnDashboard`(?)'
                , array($emailId));

            $FullName = "";
            $emailId = "";
            $mobileNo = "";
            $FirstName = "";
            $MiddleName = "";
            $LastName = "";
            $DateOfBirth = "";
            $Age = "";
            $Category = "";
            $Domicile = "";
            $Handicap = "";
            $TypeOfHandicap = "";
            $PercentageOfHandicap = "";
            $Sex = "";
            $MarriedStatus = "";
            $CurBuildingName = "";
            $CurStreetName = "";
            $CurCity = "";
            $CurState = "";
            $CurDistrict = "";
            $CurLandmark = "";
            $CurPincode = "";
            $PerBuildingName = "";
            $PerStreetName = "";
            $PerCity = "";
            $PerState = "";
            $PerDistrict = "";
            $PerLandmark = "";
            $PerPincode = "";
            $KnowOfMSOffice = "";
            $CurrentlyWorking = "";
            $Statusid = "";
            $aadharInput = "";
            $pancardNo = "";
            $TotalExperienceStepThree = "";

            foreach ($personalDetails as $item) {
                $FullName = $item->FullName;
                $emailId = $item->EmailId;
                $mobileNo = $item->MobileNo;
                $FirstName = $item->FirstName;
                $MiddleName = $item->MiddleName;
                $LastName = $item->LastName;
                $DateOfBirth = $item->DateOfBirth;
                $Age = $item->Age;
                $Category = $item->Category;
                $Domicile = $item->Domicile;
                $Handicap = $item->Handicap;
                $TypeOfHandicap = $item->TypeOfHandicap;
                $PercentageOfHandicap = $item->PercentageOfHandicap;
                $Sex = $item->Sex;
                $MarriedStatus = $item->MarriedStatus;
                $CurBuildingName = $item->CurBuildingName;
                $CurStreetName = $item->CurStreetName;
                $CurCity = $item->CurCity;
                $CurState = $item->CurState;
                $CurDistrict = $item->CurDistrict;
                $CurLandmark = $item->CurLandmark;
                $CurPincode = $item->CurPincode;
                $PerBuildingName = $item->PerBuildingName;
                $PerStreetName = $item->PerStreetName;
                $PerCity = $item->PerCity;
                $PerState = $item->PerState;
                $PerDistrict = $item->PerDistrict;
                $PerLandmark = $item->PerLandmark;
                $PerPincode = $item->PerPincode;
                $KnowOfMSOffice = $item->KnowOfMSOffice;
                $CurrentlyWorking = $item->CurrentlyWorking;
                $Statusid = $item->Statusid;
                $aadharInput = $item->aadharInput;
                $pancardNo = $item->pancardNo;
                $TotalExperienceStepThree = $item->TotalExperienceStepThree;
                $PresentationSkill = $item->PresentationSkill;
                $CommunicationSkill = $item->CommunicationSkill;
                $CoordinationSkill = $item->CoordinationSkill;
                $WritingSkill = $item->WritingSkill;

            }

            $ProfilePhoto = DB::connection($this->getDBName())->select('CALL `stp_getProfilePhotoDetails`(?)'
                , array($emailId));

            $ProfilePhotoToShow = "";

            foreach ($ProfilePhoto as $item1) {
                $ProfilePhotoToShow = $item1->Documentpath;
            }

            // Signature

            $ProfileSignature = DB::connection($this->getDBName())->select('CALL `stp_getProfileSignatureDetails`(?)'
                , array($emailId));

            $ProfileSignatureToShow = "";

            foreach ($ProfileSignature as $item2) {
                $ProfileSignatureToShow = $item2->DocumentPathSignature;
            }

            // Eduational Details
            $EducationalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetEducationalDetailsToShowOnStepII`(?)'
                , array($emailId));

            $countEducational = "";
            foreach ($EducationalDetailsToShow as $itemnice){
                $countEducational = $itemnice->SrNo;
            }

            // Professional Details
            $professionalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetprofessionalDetailsToShowOnStepII`(?)'
                , array($emailId));

            $countProfessional = "";
            foreach ($professionalDetailsToShow as $itemProfessional) {
                $countProfessional = $itemProfessional -> ProfessionalSrNo;
            }

            // Experience Details

            $ExperienceDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetExperienceDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countExperience = "";
            foreach ($ExperienceDetailsToShow as $itemExperience) {
                $countExperience = $itemExperience -> ExperienceSrNo;
            }

            // Workshop Details

            $WorkshopDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetWorkshopDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countWorkshop = "";
            foreach ($WorkshopDetailsToShow as $itemWorkshop) {
                $countWorkshop = $itemWorkshop -> WorkshopSrNo;

            }

            // TC Details

            $TrainingConductedDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingConductedDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countTrainingConducted = "";

            foreach ($TrainingConductedDetailsToShow as $itemTraining) {
                $countTrainingConducted = $itemTraining -> TCSrNo;
            }

            // Training Module Details

            $TrainingModuleDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingModuleDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countTrainingModule = "";

            foreach ($TrainingModuleDetailsToShow as $itemTrainingModule) {
                $countTrainingModule = $itemTrainingModule -> TrainingModuleSrNo;
            }

            // Article & Research Paper Published

            $ArticleResearchDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetArticleAndResearchDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countArticleResearch = "";

            foreach ($ArticleResearchDetailsToShow as $itemArticleResearch) {
                $countArticleResearch = $itemArticleResearch -> ArticleSrNo;
            }

            //  Language Proficiency

            $LanguageProficiencyDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetLanguageProficiencyDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countLanguageProficiency = "";

            foreach ($LanguageProficiencyDetailsToShow as $itemLanguageProficiency) {
                $countLanguageProficiency = $itemLanguageProficiency -> LanguageSrNo;
            }

        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'Index');
            return 'Some error occurred while processing your request...';
        }
        return view('Index.Index', compact('CategoryDetails', 'EducationDetails', 'TrainingConducted',
            'LanguageDetails','ChoiceDetails','TypesOfHandicap','PerOfHandicap','SkillRemarks', 'emailId','FirstName','MiddleName',
            'LastName','mobileNo','FullName','ProfilePhotoToShow','ProfileSignatureToShow','DateOfBirth', 'Age','Category',
            'Domicile','Handicap','TypeOfHandicap','PercentageOfHandicap','Sex','MarriedStatus',
            'CurBuildingName','CurStreetName','CurCity','CurState', 'CurDistrict','CurLandmark','CurPincode',
            'PerBuildingName', 'PerStreetName','PerCity', 'PerDistrict','PerState','PerPincode','PerLandmark','EducationalDetailsToShow',
            'professionalDetailsToShow','countEducational','countProfessional','countExperience', 'ExperienceDetailsToShow',
            'WorkshopDetailsToShow', 'countWorkshop','TrainingConductedDetailsToShow','countTrainingConducted','TrainingModuleDetailsToShow',
            'countTrainingModule','ArticleResearchDetailsToShow','countArticleResearch','LanguageProficiencyDetailsToShow',
            'countLanguageProficiency','KnowOfMSOffice','CurrentlyWorking','Statusid','aadharInput', 'pancardNo','TotalExperienceStepThree',
            'PresentationSkill','CommunicationSkill','CoordinationSkill','WritingSkill'));

    }

    // Upload Image And Signature Starts Here

    public function PostProfilePhoto(request $request)
    {
        try {

            $emailId = session()->get('EmailId');
            $data = array();

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ($validator->fails()) {

                $data['success'] = 0;
                $data['error'] = $validator->errors()->first('file');// Error response

            } else {
                if ($request->file('file')) {

                    $file = $request->file('file');
                    $filename = $file->getClientOriginalName();

                    // File extension
                    $extension = $file->getClientOriginalExtension();

                    // File upload location
                    $location = 'Upload/ProfilePhoto/';

                    $DBpPhoto = 'Upload/ProfilePhoto/' . $filename;

                    // Upload file
                    $file->move($location, $filename);

                    // File path
                    $filepath = url('files/' . $filename);

                    // Response
                    $data['success'] = 1;
                    $data['message'] = 'Uploaded Successfully!';
                    $data['filepath'] = $filepath;
                    $data['extension'] = $extension;

                    DB::connection($this->getDBName())->select('CALL `stp_InsertIntoDocumentDetailsProfilePhoto`(?,?,?)'
                        , array($DBpPhoto,$filename,$emailId ));

                } else {
                    // Response
                    $data['success'] = 2;
                    $data['message'] = 'File not uploaded.';
                }
            }

        } catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PostProfilePhoto');
            return 'Some error occurred while processing your request...';
        }
        return response()->json($data);

    }

    public function PostProfileSignature(request $request)
    {
        try {

            $emailId = session()->get('EmailId');
            $data = array();

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ($validator->fails()) {

                $data['success'] = 0;
                $data['error'] = $validator->errors()->first('file');// Error response

            } else {
                if ($request->file('file')) {

                    $file = $request->file('file');
                    $filename = $file->getClientOriginalName();

                    // File extension
                    $extension = $file->getClientOriginalExtension();

                    // File upload location
                    $location = 'Upload/ProfileSignature/';

                    $DBpSign = 'Upload/ProfileSignature/' . $filename;

                    // Upload file
                    $file->move($location, $filename);

                    // File path
                    $filepath = url('files/' . $filename);

                    // Response
                    $data['success'] = 1;
                    $data['message'] = 'Uploaded Successfully!';
                    $data['filepath'] = $filepath;
                    $data['extension'] = $extension;

                    DB::connection($this->getDBName())->select('CALL `stp_InsertIntoDocumentDetailsProfileSignature`(?,?,?)'
                        , array($DBpSign,$filename,$emailId ));

                } else {
                    // Response
                    $data['success'] = 2;
                    $data['message'] = 'File not uploaded.';
                }
            }

        } catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PostProfileSignature');
            return 'Some error occurred while processing your request...';
        }
        return response()->json($data);
    }

    // Ends Here

    // Post Function Starts Here

    public function PartISubmit(request $request){

        try {

            $emailId = session()->get('EmailId');

            $FirstName = $request["FirstName"];
            $MiddleName = $request["MiddleName"];
            $LastName = $request["LastName"];
            $categories = $request->input("categories");

//            $QualificationArray = $request->input('Qualification');

            $dateOfBirth = $request["dateOfBirth"];
            $calculateAge = $request["calculateAge"];
            $DOMRadio = $request["DOMRadio"];
            $SexRadio = $request["SexRadio"];
            $MSRadio = $request["MSRadio"];
            $AYFHCRadio = $request["AYFHCRadio"];
            $buildingName = $request["buildingName"];
            $streetName = $request["streetName"];
            $city = $request["city"];
            $state = $request["state"];
            $district = $request["district"];
            $landmark = $request["landmark"];
            $pincode = $request["pincode"];
            $perBuildingName = $request["perBuildingName"];
            $perStreetName = $request["perStreetName"];
            $perCity = $request["perCity"];
            $perState = $request["perState"];
            $perDistrict = $request["perDistrict"];
            $perLandmark = $request["perLandmark"];
            $perPincode = $request["perPincode"];
            $PercentOfHandicap = $request["PercentOfHandicap"];
            $HandicapTypeHere = $request["HandicapTypeHere"];
            $aadharInput = $request["aadharInput"];
            $pancardNo = $request["pancardNo"];
            $emailIdToPost = $emailId;

            $data = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoPartISubmit`(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
                , array($dateOfBirth, $calculateAge, $categories, $DOMRadio, $AYFHCRadio, $HandicapTypeHere, $PercentOfHandicap, $SexRadio,
                    $MSRadio, $buildingName, $streetName, $city, $state, $district, $landmark, $pincode,
                    $perBuildingName, $perStreetName, $perCity, $perState, $perDistrict, $perLandmark,
                    $perPincode, $emailIdToPost, $aadharInput, $pancardNo, $FirstName, $MiddleName, $LastName));

            $a="";

            foreach ($data as $item) {
                $a = $item->success;
            }

            if($a == 'success'){
                $Status = 1;
            }

        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PartISubmit');
            return 'Some error occurred while processing your request...';
        }
        return response()->json($Status);
    }

    public function PartIISubmit(request $request){

        try{
            $emailId = session()->get('EmailId');

            // Educational Details

            $QualificationArray = $request->input('Qualification');
            $QualificationArrayString = explode(',', $QualificationArray);
            $QualificationArrayStringlength = count($QualificationArrayString);

            $streamArray = $request->input('Stream');
            $streamArrayString = explode(',', $streamArray);

            $CollegeNameArray = $request->input('CollegeName');
            $CollegeNameString = explode(',', $CollegeNameArray);

            $PercentageArray = $request->input('Percentage');
            $PercentageArrayString = explode(',', $PercentageArray);

            $yearArray = $request->input('year');
            $yearArrayString = explode(',', $yearArray);

            $SubjectArray = $request->input('Subject');
            $SubjectArrayString = explode(',', $SubjectArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteFromPartIISubmit`(?)'
                , array($emailId));

            $numberEducational = 1;

            for ($i = 0; $i < $QualificationArrayStringlength; $i++) {

                $valueToCheck = $QualificationArrayString[$i];

                if( $valueToCheck != 'Select' && $valueToCheck!=""){

                    $value = $numberEducational;
                    $value1 = $streamArrayString[$i];
                    $value2 = $QualificationArrayString[$i];
                    $value3 = $CollegeNameString[$i];
                    $value4 = $PercentageArrayString[$i];
                    $value5 = $yearArrayString[$i];
                    $value6 = $SubjectArrayString[$i];
                    $numberEducational++;

                    $PartIIdata = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoPartIISubmit`(?, ?, ?, ?, ?, ?, ?, ?)'
                        , array($value, $value1, $value2, $value3, $value4, $value5, $value6, $emailId));

                    $a = "";

                    foreach ($PartIIdata as $item) {
                        $a = $item->success;
                    }

                    if ($a == 'success') {
                        $Status = 1;
                    }
                }else{
                    $Status = 1;
                }
            }


            // Other Details

            $otherCertiArray = $request->input('otherCerti');
            $otherCertiArrayString = explode(',', $otherCertiArray);
            $otherCertiArrayStringlength = count($otherCertiArrayString);

            $otherOrgArray = $request->input('otherOrg');
            $otherOrgArrayString = explode(',', $otherOrgArray);

            $otherYearArray = $request->input('otherYear');
            $otherYearArrayString = explode(',', $otherYearArray);

            $otherPercArray = $request->input('otherPerc');
            $otherPercArrayString = explode(',', $otherPercArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteOtherFromPartIISubmit`(?)'
                , array($emailId));


            $numberotherCerti = 1;

            for ($j = 0; $j < $otherCertiArrayStringlength; $j++) {

                $valueToCheckOthers = $otherCertiArrayString[$j];

                if(  $valueToCheckOthers != null ){

                    $othervalue = $numberotherCerti;
                    $othervalue1 = $otherCertiArrayString[$j];
                    $othervalue2 = $otherOrgArrayString[$j];
                    $othervalue3 = $otherYearArrayString[$j];
                    $othervalue4 = $otherPercArrayString[$j];
                    $numberotherCerti++;

                    $OtherPartData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoOthersPartIISubmit`(?,?,?,?,?,?)'
                        , array($othervalue, $othervalue1, $othervalue2, $othervalue3, $othervalue4, $emailId));

                    $b = '';

                    foreach ($OtherPartData as $item) {
                        $b = $item->success;
                    }

                    if ($b == 'success') {
                        $otherStatus = 1;
                    }
                }else{
                    $otherStatus = 1;
                }
            }


        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PartIISubmit');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'Status' => $Status,
            'otherStatus' => $otherStatus,
        ]);
    }

    public function PartIIISubmit(request $request){

        try{
            $emailId = session()->get('EmailId');

            $KOMORadio = $request["KOMORadio"];
            $CYAWFTRadio = $request["CYAWFTRadio"];
            $totalExperience = $request["totalExperience"];



            $PresentationSkill = $request["PresentationSkill"];
            $CommunicationSkill = $request["CommunicationSkill"];
            $CoordinationSkill = $request["CoordinationSkill"];

            $WritingSkill = $request["WritingSkill"];

            DB::connection($this->getDBName())->select('CALL `stp_InsertIntopersonaldetailsPartIIISubmit`(?,?,?,?,?,?,?,?)'
                , array($KOMORadio, $CYAWFTRadio, $totalExperience, $emailId,$PresentationSkill, $CommunicationSkill,$CoordinationSkill, $WritingSkill));

            //Experience Details

            $ExpOrgArray = $request->input('ExpOrg');
            $ExpOrgArrayString = explode(',', $ExpOrgArray);
            $ExpOrgArrayStringlength = count($ExpOrgArrayString);

            $ExpJoiningArray = $request->input('ExpJoining');
            $ExpJoiningArrayString = explode(',', $ExpJoiningArray);

            $ExpLeavingArray = $request->input('ExpLeaving');
            $ExpLeavingArrayString = explode(',', $ExpLeavingArray);

            $ExpTotalArray = $request->input('ExpTotal');
            $ExpTotalArrayString = explode(',', $ExpTotalArray);

            $ExpPositionArray = $request->input('ExpPosition');
            $ExpPositionArrayString = explode(',', $ExpPositionArray);

            $ExpRoleArray = $request->input('ExpRole');
            $ExpRoleArrayString = explode(',', $ExpRoleArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteExperienceFromPartIIISubmit`(?)'
                , array($emailId));


            $numberExperience = 1;

            for( $k = 0; $k < $ExpOrgArrayStringlength; $k++ ){

                $valueToCheckExpe = $ExpOrgArrayString[$k];

                if( $valueToCheckExpe != null ){

                    $ExperienceValue = $numberExperience;
                    $ExperienceValue1 = $ExpOrgArrayString[$k];
                    $ExperienceValue2 = $ExpJoiningArrayString[$k];
                    $ExperienceValue3 = $ExpLeavingArrayString[$k];
                    $ExperienceValue4 = $ExpTotalArrayString[$k];
                    $ExperienceValue5 = $ExpPositionArrayString[$k];
                    $ExperienceValue6 = $ExpRoleArrayString[$k];
                    $numberExperience++;

                    $ExperienceData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoExperiencePartIIISubmit`(?,?,?,?,?,?,?,?)'
                        , array($ExperienceValue,$ExperienceValue1,$ExperienceValue2,$ExperienceValue3,$ExperienceValue4,
                            $ExperienceValue5,$ExperienceValue6,$emailId));

                    $c = '';

                    foreach ($ExperienceData as $item){
                        $c = $item->success;
                    }

                    if($c == 'success'){
                        $ExperienceStatus = 1;
                    }
                }else{
                    $ExperienceStatus = 1;
                }
            }

            //Workshop Details

            $WorkshopTrainingArray = $request->input('WorkshopTrainingP');
            $WorkshopTrainingArrayString = explode(',', $WorkshopTrainingArray);
            $WorkshopTrainingArrayStringlength = count($WorkshopTrainingArrayString);

            $workshopOriArray = $request->input('workshopOri');
            $workshopOriArrayString = explode(',', $workshopOriArray);

            $workshopDuraArray = $request->input('workshopDura');
            $workshopDuraArrayString = explode(',', $workshopDuraArray);

            $WorkshopYearArray = $request->input('WorkshopYear');
            $WorkshopYearArrayString = explode(',', $WorkshopYearArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteWorkshopFromPartIIISubmit`(?)'
                , array($emailId));

            $numberWorkshop = 1;

            for( $l = 0; $l < $WorkshopTrainingArrayStringlength; $l++ ) {

                $valueToCheckWorkshop = $WorkshopTrainingArrayString[$l];

                if( $valueToCheckWorkshop != null && $valueToCheckWorkshop!="" ){

                    $WorkshopValue = $numberWorkshop;
                    $WorkshopValue1 = $WorkshopTrainingArrayString[$l];
                    $WorkshopValue2 = $workshopOriArrayString[$l];
                    $WorkshopValue3 = $workshopDuraArrayString[$l];
                    $WorkshopValue4 = $WorkshopYearArrayString[$l];

                    $numberWorkshop++;

                    $WorkshopData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoWorkshopPartIIISubmit`(?,?,?,?,?,?)'
                        , array($WorkshopValue, $WorkshopValue1, $WorkshopValue2, $WorkshopValue3, $WorkshopValue4, $emailId));

                    $d = '';

                    foreach ($WorkshopData as $item) {
                        $d = $item->success;
                    }

                    if ($d == 'success') {
                        $WorkshopStatus = 1;
                    }
                }else{
                    $WorkshopStatus = 1;
                }
            }


            // Training Conducted As

            $TrainingsConductedASArray = $request->input('TrainingsConductedAS');
            $TrainingsConductedASArrayString = explode(',', $TrainingsConductedASArray);
            $TrainingsConductedASArrayStringlength = count($TrainingsConductedASArrayString);

            $TCOrginationNameArray = $request->input('TCOrginationName');
            $TCOrginationNameArrayString = explode(',', $TCOrginationNameArray);

            $TCTrainingProgramArray = $request->input('TCTrainingProgram');
            $TCTrainingProgramArrayString = explode(',', $TCTrainingProgramArray);

            $TCSubjectArray = $request->input('TCSubject');
            $TCSubjectArrayString = explode(',', $TCSubjectArray);

            $TCDurationOfTPArray = $request->input('TCDurationOfTP');
            $TCDurationOfTPArrayString = explode(',', $TCDurationOfTPArray);

            $TCYearArray = $request->input('TCYear');
            $TCYearArrayString = explode(',', $TCYearArray);

            $TCParticipantArray = $request->input('TCParticipant');
            $TCParticipantArrayString = explode(',', $TCParticipantArray);

            $TCVenueArray = $request->input('TCVenue');
            $TCVenueArrayString = explode(',', $TCVenueArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteTrainingConductedFromPartIIISubmit`(?)'
                , array($emailId));

            $numbertrainingConducted = 1;

            for( $m = 0; $m < $TrainingsConductedASArrayStringlength; $m++ ){

                $valueToCheckTrainingConducted = $TrainingsConductedASArrayString[$m];

                if( $valueToCheckTrainingConducted != 'Select' && $valueToCheckTrainingConducted!="" ){

                    $trainingConductedValue = $numbertrainingConducted;
                    $trainingConductedValue1 = $TrainingsConductedASArrayString[$m];
                    $trainingConductedValue2 = $TCOrginationNameArrayString[$m];
                    $trainingConductedValue3 = $TCTrainingProgramArrayString[$m];
                    $trainingConductedValue4 = $TCSubjectArrayString[$m];
                    $trainingConductedValue5 = $TCDurationOfTPArrayString[$m];
                    $trainingConductedValue6 = $TCYearArrayString[$m];
                    $trainingConductedValue7 = $TCParticipantArrayString[$m];
                    $trainingConductedValue8 = $TCVenueArrayString[$m];

                    $numbertrainingConducted++;

                    $trainingConductedData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntotraningconductedPartIIISubmit`(?,?,?,?,?,?,?,?,?,?)'
                        , array($trainingConductedValue,$trainingConductedValue1,$trainingConductedValue2,$trainingConductedValue3,
                            $trainingConductedValue4,$trainingConductedValue5,$trainingConductedValue6,$trainingConductedValue7,
                            $trainingConductedValue8,$emailId));

                    $e = '';

                    foreach ($trainingConductedData as $item){
                        $e = $item->success;
                    }

                    if($e == 'success'){
                        $trainingConductedStatus = 1;
                    }
                }else{
                    $trainingConductedStatus = 1;
                }
            }


            // Training Module

            $TMNameArray = $request->input('TMName');
            $TMNameArrayString = explode(',', $TMNameArray);
            $TMNameArrayStringlength = count($TMNameArrayString);

            $TMOrginationNameArray = $request->input('TMOrginationName');
            $TMOrginationNameArrayString = explode(',', $TMOrginationNameArray);

            $TMRoleArray = $request->input('TMRole');
            $TMRoleArrayString = explode(',', $TMRoleArray);

            $TMYearArray = $request->input('TMYear');
            $TMYearArrayString = explode(',', $TMYearArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteTrainingModuleFromPartIIISubmit`(?)'
                , array($emailId));

            $numberTrainingModule = 1;

            for( $n = 0; $n < $TMNameArrayStringlength; $n++ ){

                $valueToCheckTrainingModule = $TMNameArrayString[$n];

                if( $valueToCheckTrainingModule != null ){

                    $trainingModuleValue = $numberTrainingModule;
                    $trainingModuleValue1 = $TMNameArrayString[$n];
                    $trainingModuleValue2 = $TMOrginationNameArrayString[$n];
                    $trainingModuleValue3 = $TMRoleArrayString[$n];
                    $trainingModuleValue4 = $TMYearArrayString[$n];

                    $numberTrainingModule++;

                    $trainingModuleData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntotraningModulePartIIISubmit`(?,?,?,?,?,?)'
                        , array($trainingModuleValue,$trainingModuleValue1,$trainingModuleValue2,$trainingModuleValue3,
                            $trainingModuleValue4, $emailId));

                    $f = '';

                    foreach ($trainingModuleData as $item){
                        $f = $item->success;
                    }

                    if($f == 'success'){
                        $trainingModuleStatus = 1;
                    }
                }else{
                    $trainingModuleStatus = 1;
                }
            }

            // Article And Research

            $ARPaperArray = $request->input('ARPaper');
            $ARPaperArrayString = explode(',', $ARPaperArray);
            $ARPaperArrayStringlength = count($ARPaperArrayString);

            $ARPublishedByArray = $request->input('ARPublishedBy');
            $ARPublishedByArrayString = explode(',', $ARPublishedByArray);

            $ARLanguageArray = $request->input('ARLanguage');
            $ARLanguageArrayString = explode(',', $ARLanguageArray);

            $ARYearArray = $request->input('ARYear');
            $ARYearArrayString = explode(',', $ARYearArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteArticleResearchFromPartIIISubmit`(?)'
                , array($emailId));

            $numberArticleResearch = 1;

            for( $o = 0; $o < $ARPaperArrayStringlength; $o++ ){

                $valueToCheckArticleResearch = $ARPaperArrayString[$o];

                if( $valueToCheckArticleResearch != null ){

                    $ArticleResearchValue = $numberArticleResearch;
                    $ArticleResearchValue1 = $ARPaperArrayString[$o];
                    $ArticleResearchValue2 = $ARPublishedByArrayString[$o];
                    $ArticleResearchValue3 = $ARLanguageArrayString[$o];
                    $ArticleResearchValue4 = $ARYearArrayString[$o];

                    $numberArticleResearch++;

                    $ArticleResearchData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoArticleResearchPartIIISubmit`(?,?,?,?,?,?)'
                        , array($ArticleResearchValue,$ArticleResearchValue1,$ArticleResearchValue2,$ArticleResearchValue3,
                            $ArticleResearchValue4, $emailId));

                    $g = '';

                    foreach ($ArticleResearchData as $item){
                        $g = $item->success;
                    }

                    if($g == 'success'){
                        $ArticleResearchStatus = 1;
                    }
                }else{
                    $ArticleResearchStatus = 1;
                }
            }


            // Language Proficiency

            $LPKnownArray = $request->input('LPKnown');
            $LPKnownArrayString = explode(',', $LPKnownArray);
            $LPKnownArrayStringlength = count($LPKnownArrayString);

            $LPReadArray = $request->input('LPRead');
            $LPReadArrayString = explode(',', $LPReadArray);

            $LPWriteArray = $request->input('LPWrite');
            $LPWriteArrayString = explode(',', $LPWriteArray);

            $LPSpeakArray = $request->input('LPSpeak');
            $LPSpeakArrayString = explode(',', $LPSpeakArray);

            DB::connection($this->getDBName())->select('CALL `stp_deleteLanguageProficiencyFromPartIIISubmit`(?)'
                , array($emailId));

            $numberLanguageProficiency = 1;

            for( $p = 0; $p < $LPKnownArrayStringlength; $p++ ){

                $valueToCheckLanguage = $LPKnownArrayString[$p];

                if( $valueToCheckLanguage != 'Select' && $valueToCheckLanguage!="" ){

                    $LanguageProficiencyValue = $numberLanguageProficiency;
                    $LanguageProficiencyValue1 = $LPKnownArrayString[$p];
                    $LanguageProficiencyValue2 = $LPReadArrayString[$p];
                    $LanguageProficiencyValue3 = $LPWriteArrayString[$p];
                    $LanguageProficiencyValue4 = $LPSpeakArrayString[$p];

                    $numberLanguageProficiency++;

                    $LanguageProficiencyData = DB::connection($this->getDBName())->select('CALL `stp_InsertIntoLanguageProficiencyPartIIISubmit`(?,?,?,?,?,?)'
                        , array($LanguageProficiencyValue,$LanguageProficiencyValue1,$LanguageProficiencyValue2,$LanguageProficiencyValue3,
                            $LanguageProficiencyValue4, $emailId));

                    $h = '';

                    foreach ($LanguageProficiencyData as $item){
                        $h = $item->success;
                    }

                    if($h == 'success'){
                        $LanguageStatus = 1;
                    }
                }else{
                    $LanguageStatus = 1;
                }
            }

        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PartIIISubmit');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'ExperienceStatus' => $ExperienceStatus,
            'WorkshopStatus' => $WorkshopStatus,
            'trainingConductedStatus' => $trainingConductedStatus,
            'trainingModuleStatus' => $trainingModuleStatus,
            'ArticleResearchStatus' => $ArticleResearchStatus,
            'LanguageStatus' => $LanguageStatus,
        ]);

    }

    public function PartIVDeclarationSubmit(request $request){

        try{
            $emailId = session()->get('EmailId');

            $Declaration = $request["Declaration"];

            DB::connection($this->getDBName())->select('CALL `stp_InsertIntoPartIVDeclarationSubmit`(?,?)'
                , array($Declaration,  $emailId));

        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'PartIVDeclarationSubmit');
            return 'Some error occurred while processing your request...';
        }
        return response()->json();
    }

// Post Function Ends Here

    public function DeleteRowFromTable(request $request){

        try{

            $emailId = session()->get('EmailId');

            $DeleteRow = $request["DeleteRowId"];
            $Name = $request["tableName"];

            if($Name == 'EducationalDetails'){

                $Status =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromEducationalDetails`(?,?)'
                    , array($DeleteRow,$emailId));

                if( $Status[0]->STATUS_VAR == '1' ){
                    $StatusToSend = '1';
                }

                if( $Status[0]->STATUS_VAR == '0' ){
                    $StatusToSend = '0';
                }

            }elseif ($Name == 'professionalDetails'){

                $StatusProfessional =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromProfessionalDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $a = "";

                foreach ($StatusProfessional as $itemProfessional){
                    $a = $itemProfessional -> success;
                }

                if($a == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'ExperienceDetails'){

                $StatusExperience =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromExperienceDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $b = "";

                foreach ($StatusExperience as $itemExpeirence){
                    $b = $itemExpeirence -> success;
                }

                if($b == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'WorkshopDetails'){

                $StatusWorkshop =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromWorkshopDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $c = "";

                foreach ($StatusWorkshop as $itemWorkshop){
                    $c = $itemWorkshop -> success;
                }

                if($c == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'TrainingConductedDetails'){

                $StatusTrainingConduct =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromTrainingConductedDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $d = "";

                foreach ($StatusTrainingConduct as $itemtrainingConduct){
                    $d = $itemtrainingConduct -> success;
                }

                if($d == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'TrainingModuleDetails'){

                $StatusTrainingModule =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromTrainingModuleDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $e = "";

                foreach ($StatusTrainingModule as $itemtrainingModule){
                    $e = $itemtrainingModule -> success;
                }

                if($e == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'ArticleResearch'){

                $StatusArticleResearch =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromArticleResearchDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $e = "";

                foreach ($StatusArticleResearch as $itemArticleResearch){
                    $e = $itemArticleResearch -> success;
                }

                if($e == 'success'){
                    $StatusToSend = 1;
                }

            }elseif ($Name == 'LanguageProficiency'){

                $StatusLanguageProficiency =   DB::connection($this->getDBName())->select('CALL `stp_deleteRowFromLanguageProficiencyDetails`(?,?)'
                    , array($emailId,$DeleteRow));

                $f = "";

                foreach ($StatusLanguageProficiency as $itemLanguageProficiency){
                    $f = $itemLanguageProficiency -> success;
                }

                if($f == 'success'){
                    $StatusToSend = 1;
                }

            }

        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'DeleteRowFromTable');
            return 'Some error occurred while processing your request...';
        }
        return response()->json($StatusToSend);
    }

// Dashboard
    public function Dashboard(){
        try{
            $emailId = session()->get('EmailId');

            {
                $personalDetails =  DB::connection($this->getDBName())->select('CALL `stp_getDetailsToShowOnDashboard`(?)'
                    , array($emailId));

                $FullName = "";
                $FirstName = "";
                foreach ($personalDetails as $item) {
                    $FullName = $item->FullName;
                    $FirstName = $item->FirstName;
                    $Statusid = $item->Statusid;
                }
            }


        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'Dashboard');
            return 'Some error occurred while processing your request...';
        }
        return view('Index.Dashboard', compact('emailId','FullName', 'personalDetails','FirstName',
            'Statusid'));
    }

// View Form Here
    public function ViewApplicationForm(){
        try{
            $emailId = session()->get('EmailId');
            $CategoryDetails = DB::connection($this->getDBName())->select('CALL `stp_getCategoryDetails`');
            $EducationDetails = DB::connection($this->getDBName())->select('CALL `stp_getEducationDetails`');
            $TrainingConducted = DB::connection($this->getDBName())->select('CALL `stp_getTrainingConducted`');
            $LanguageDetails = DB::connection($this->getDBName())->select('CALL `stp_getLanguageDetails`');
            $ChoiceDetails = DB::connection($this->getDBName())->select('CALL `stp_getChoiceYesOrNo`');
            $TypesOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getTypesOfHandicap`');
            $PerOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getPerOfHandicap`');
            $SkillRemarks = DB::connection($this->getDBName())->select('CALL `stp_getSkillRemarks`');

            $personalDetails =  DB::connection($this->getDBName())->select('CALL `stp_getDetailsToShowOnDashboard`(?)'
                , array($emailId));

            $FullName = "";
            $emailId = "";
            $mobileNo = "";

            $FirstName = "";
            $MiddleName = "";
            $LastName = "";
            $DateOfBirth = "";
            $Age = "";
            $Category = "";
            $Domicile = "";
            $Handicap = "";
            $TypeOfHandicap = "";
            $PercentageOfHandicap = "";
            $Sex = "";
            $MarriedStatus = "";
            $CurBuildingName = "";
            $CurStreetName = "";
            $CurCity = "";
            $CurState = "";
            $CurDistrict = "";
            $CurLandmark = "";
            $CurPincode = "";
            $PerBuildingName = "";
            $PerStreetName = "";
            $PerCity = "";
            $PerState = "";
            $PerDistrict = "";
            $PerLandmark = "";
            $PerPincode = "";
            $KnowOfMSOffice = "";
            $CurrentlyWorking = "";
            $Statusid = "";
            $aadharInput = "";
            $pancardNo = "";

            foreach ($personalDetails as $item) {
                $FullName = $item->FullName;
                $emailId = $item->EmailId;
                $mobileNo = $item->MobileNo;
                $FirstName = $item->FirstName;
                $MiddleName = $item->MiddleName;
                $LastName = $item->LastName;
                $DateOfBirth = $item->DateOfBirth;
                $Age = $item->Age;
                $Category = $item->Category;
                $Domicile = $item->Domicile;
                $Handicap = $item->Handicap;
                $TypeOfHandicap = $item->TypeOfHandicap;
                $PercentageOfHandicap = $item->PercentageOfHandicap;
                $Sex = $item->Sex;
                $MarriedStatus = $item->MarriedStatus;
                $CurBuildingName = $item->CurBuildingName;
                $CurStreetName = $item->CurStreetName;
                $CurCity = $item->CurCity;
                $CurState = $item->CurState;
                $CurDistrict = $item->CurDistrict;
                $CurLandmark = $item->CurLandmark;
                $CurPincode = $item->CurPincode;
                $PerBuildingName = $item->PerBuildingName;
                $PerStreetName = $item->PerStreetName;
                $PerCity = $item->PerCity;
                $PerState = $item->PerState;
                $PerDistrict = $item->PerDistrict;
                $PerLandmark = $item->PerLandmark;
                $PerPincode = $item->PerPincode;
                $KnowOfMSOffice = $item->KnowOfMSOffice;
                $CurrentlyWorking = $item->CurrentlyWorking;
                $Statusid = $item->Statusid;
                $aadharInput = $item->aadharInput;
                $pancardNo = $item->pancardNo;
                $PresentationSkill = $item->PresentationSkill;
                $CommunicationSkill = $item->CommunicationSkill;
                $CoordinationSkill = $item->CoordinationSkill;
                $WritingSkill = $item->WritingSkill;
                $TotalExperienceStepThree = $item->TotalExperienceStepThree;
            }

            $ProfilePhoto = DB::connection($this->getDBName())->select('CALL `stp_getProfilePhotoDetails`(?)'
                , array($emailId));

            $ProfilePhotoToShow = "";

            foreach ($ProfilePhoto as $item1) {
                $ProfilePhotoToShow = $item1->Documentpath;
            }

            // Signature

            $ProfileSignature = DB::connection($this->getDBName())->select('CALL `stp_getProfileSignatureDetails`(?)'
                , array($emailId));

            $ProfileSignatureToShow = "";

            foreach ($ProfileSignature as $item2) {
                $ProfileSignatureToShow = $item2->DocumentPathSignature;
            }

            // Eduational Details
            $EducationalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetEducationalDetailsToShowOnStepII`(?)'
                , array($emailId));

            $countEducational = "";
            foreach ($EducationalDetailsToShow as $itemnice){
                $countEducational = $itemnice->SrNo;
            }

            // Professional Details
            $professionalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetprofessionalDetailsToShowOnStepII`(?)'
                , array($emailId));

            $countProfessional = "";
            foreach ($professionalDetailsToShow as $itemProfessional) {
                $countProfessional = $itemProfessional -> ProfessionalSrNo;
            }

            // Experience Details

            $ExperienceDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetExperienceDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countExperience = "";
            foreach ($ExperienceDetailsToShow as $itemExperience) {
                $countExperience = $itemExperience -> ExperienceSrNo;
            }

            // Workshop Details

            $WorkshopDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetWorkshopDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countWorkshop = "";
            foreach ($WorkshopDetailsToShow as $itemWorkshop) {
                $countWorkshop = $itemWorkshop -> WorkshopSrNo;

            }

            // TC Details

            $TrainingConductedDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingConductedDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countTrainingConducted = "";

            foreach ($TrainingConductedDetailsToShow as $itemTraining) {
                $countTrainingConducted = $itemTraining -> TCSrNo;
            }

            // Training Module Details

            $TrainingModuleDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingModuleDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countTrainingModule = "";

            foreach ($TrainingModuleDetailsToShow as $itemTrainingModule) {
                $countTrainingModule = $itemTrainingModule -> TrainingModuleSrNo;
            }

            // Article & Research Paper Published

            $ArticleResearchDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetArticleAndResearchDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countArticleResearch = "";

            foreach ($ArticleResearchDetailsToShow as $itemArticleResearch) {
                $countArticleResearch = $itemArticleResearch -> ArticleSrNo;
            }

            //  Language Proficiency

            $LanguageProficiencyDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetLanguageProficiencyDetailsToShowOnStepIII`(?)'
                , array($emailId));

            $countLanguageProficiency = "";

            foreach ($LanguageProficiencyDetailsToShow as $itemLanguageProficiency) {
                $countLanguageProficiency = $itemLanguageProficiency -> LanguageSrNo;
            }
        }catch (\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'IndexController', 'ViewForm');
            return 'Some error occurred while processing your request...';
        }
        return view('Index.ViewApplicationForm', compact('CategoryDetails', 'EducationDetails', 'TrainingConducted',
            'LanguageDetails','ChoiceDetails','emailId','TypesOfHandicap','PerOfHandicap','SkillRemarks', 'FirstName','MiddleName',
            'LastName','mobileNo','FullName','ProfilePhotoToShow','ProfileSignatureToShow','DateOfBirth', 'Age','Category',
            'Domicile','Handicap','TypeOfHandicap','PercentageOfHandicap','Sex','MarriedStatus',
            'CurBuildingName','CurStreetName','CurCity','CurState', 'CurDistrict','CurLandmark','CurPincode',
            'PerBuildingName', 'PerStreetName','PerCity', 'PerDistrict','PerState','PerPincode','PerLandmark','EducationalDetailsToShow',
            'professionalDetailsToShow','countEducational','countProfessional','countExperience', 'ExperienceDetailsToShow',
            'WorkshopDetailsToShow', 'countWorkshop','TrainingConductedDetailsToShow','countTrainingConducted','TrainingModuleDetailsToShow',
            'countTrainingModule','ArticleResearchDetailsToShow','countArticleResearch','LanguageProficiencyDetailsToShow',
            'countLanguageProficiency','KnowOfMSOffice','CurrentlyWorking','Statusid','aadharInput', 'pancardNo','aadharInput','PresentationSkill',
        'CommunicationSkill','CoordinationSkill','WritingSkill','TotalExperienceStepThree'));
    }

    public function generatePDF()
    {
        $emailId = session()->get('EmailId');
        $CategoryDetails = DB::connection($this->getDBName())->select('CALL `stp_getCategoryDetails`');
        $EducationDetails = DB::connection($this->getDBName())->select('CALL `stp_getEducationDetails`');
        $TrainingConducted = DB::connection($this->getDBName())->select('CALL `stp_getTrainingConducted`');
        $LanguageDetails = DB::connection($this->getDBName())->select('CALL `stp_getLanguageDetails`');
        $ChoiceDetails = DB::connection($this->getDBName())->select('CALL `stp_getChoiceYesOrNo`');
        $TypesOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getTypesOfHandicap`');
        $PerOfHandicap = DB::connection($this->getDBName())->select('CALL `stp_getPerOfHandicap`');
        $SkillRemarks = DB::connection($this->getDBName())->select('CALL `stp_getSkillRemarks`');

        $personalDetails =  DB::connection($this->getDBName())->select('CALL `stp_getDetailsToShowOnDashboard`(?)'
            , array($emailId));

        $FullName = "";
        $emailId = "";
        $mobileNo = "";

        $FirstName = "";
        $MiddleName = "";
        $LastName = "";
        $DateOfBirth = "";
        $Age = "";
        $Category = "";
        $Domicile = "";
        $Handicap = "";
        $TypeOfHandicap = "";
        $PercentageOfHandicap = "";
        $Sex = "";
        $MarriedStatus = "";
        $CurBuildingName = "";
        $CurStreetName = "";
        $CurCity = "";
        $CurState = "";
        $CurDistrict = "";
        $CurLandmark = "";
        $CurPincode = "";
        $PerBuildingName = "";
        $PerStreetName = "";
        $PerCity = "";
        $PerState = "";
        $PerDistrict = "";
        $PerLandmark = "";
        $PerPincode = "";
        $KnowOfMSOffice = "";
        $CurrentlyWorking = "";
        $Statusid = "";
        $aadharInput = "";
        $pancardNo = "";

        foreach ($personalDetails as $item) {
            $FullName = $item->FullName;
            $emailId = $item->EmailId;
            $mobileNo = $item->MobileNo;
            $FirstName = $item->FirstName;
            $MiddleName = $item->MiddleName;
            $LastName = $item->LastName;
            $DateOfBirth = $item->DateOfBirth;
            $Age = $item->Age;
            $Category = $item->Category;
            $Domicile = $item->Domicile;
            $Handicap = $item->Handicap;
            $TypeOfHandicap = $item->TypeOfHandicap;
            $PercentageOfHandicap = $item->PercentageOfHandicap;
            $Sex = $item->Sex;
            $MarriedStatus = $item->MarriedStatus;
            $CurBuildingName = $item->CurBuildingName;
            $CurStreetName = $item->CurStreetName;
            $CurCity = $item->CurCity;
            $CurState = $item->CurState;
            $CurDistrict = $item->CurDistrict;
            $CurLandmark = $item->CurLandmark;
            $CurPincode = $item->CurPincode;
            $PerBuildingName = $item->PerBuildingName;
            $PerStreetName = $item->PerStreetName;
            $PerCity = $item->PerCity;
            $PerState = $item->PerState;
            $PerDistrict = $item->PerDistrict;
            $PerLandmark = $item->PerLandmark;
            $PerPincode = $item->PerPincode;
            $KnowOfMSOffice = $item->KnowOfMSOffice;
            $CurrentlyWorking = $item->CurrentlyWorking;
            $Statusid = $item->Statusid;
            $aadharInput = $item->aadharInput;
            $pancardNo = $item->pancardNo;
            $PresentationSkill = $item->PresentationSkill;
            $CommunicationSkill = $item->CommunicationSkill;
            $CoordinationSkill = $item->CoordinationSkill;
            $WritingSkill = $item->WritingSkill;
            $TotalExperienceStepThree = $item->TotalExperienceStepThree;
        }

        $ProfilePhoto = DB::connection($this->getDBName())->select('CALL `stp_getProfilePhotoDetails`(?)'
            , array($emailId));

        $ProfilePhotoToShow = "";

        foreach ($ProfilePhoto as $item1) {
            $ProfilePhotoToShow = $item1->Documentpath;
        }

        // Signature

        $ProfileSignature = DB::connection($this->getDBName())->select('CALL `stp_getProfileSignatureDetails`(?)'
            , array($emailId));

        $ProfileSignatureToShow = "";

        foreach ($ProfileSignature as $item2) {
            $ProfileSignatureToShow = $item2->DocumentPathSignature;
        }

        // Eduational Details
        $EducationalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetEducationalDetailsToShowOnStepII`(?)'
            , array($emailId));

        $countEducational = "";
        foreach ($EducationalDetailsToShow as $itemnice){
            $countEducational = $itemnice->SrNo;
        }

        // Professional Details
        $professionalDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetprofessionalDetailsToShowOnStepII`(?)'
            , array($emailId));

        $countProfessional = "";
        foreach ($professionalDetailsToShow as $itemProfessional) {
            $countProfessional = $itemProfessional -> ProfessionalSrNo;
        }

        // Experience Details

        $ExperienceDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetExperienceDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countExperience = "";
        foreach ($ExperienceDetailsToShow as $itemExperience) {
            $countExperience = $itemExperience -> ExperienceSrNo;
        }

        // Workshop Details

        $WorkshopDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetWorkshopDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countWorkshop = "";
        foreach ($WorkshopDetailsToShow as $itemWorkshop) {
            $countWorkshop = $itemWorkshop -> WorkshopSrNo;

        }

        // TC Details

        $TrainingConductedDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingConductedDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countTrainingConducted = "";

        foreach ($TrainingConductedDetailsToShow as $itemTraining) {
            $countTrainingConducted = $itemTraining -> TCSrNo;
        }

        // Training Module Details

        $TrainingModuleDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetTrainingModuleDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countTrainingModule = "";

        foreach ($TrainingModuleDetailsToShow as $itemTrainingModule) {
            $countTrainingModule = $itemTrainingModule -> TrainingModuleSrNo;
        }

        // Article & Research Paper Published

        $ArticleResearchDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetArticleAndResearchDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countArticleResearch = "";

        foreach ($ArticleResearchDetailsToShow as $itemArticleResearch) {
            $countArticleResearch = $itemArticleResearch -> ArticleSrNo;
        }

        //  Language Proficiency

        $LanguageProficiencyDetailsToShow = DB::connection($this->getDBName())->select('CALL `stp_GetLanguageProficiencyDetailsToShowOnStepIII`(?)'
            , array($emailId));

        $countLanguageProficiency = "";

        foreach ($LanguageProficiencyDetailsToShow as $itemLanguageProficiency) {
            $countLanguageProficiency = $itemLanguageProficiency -> LanguageSrNo;
        }




        $pdf = PDF::loadView('Index.FormPdf', compact('CategoryDetails', 'EducationDetails', 'TrainingConducted',
            'LanguageDetails','ChoiceDetails','emailId','TypesOfHandicap','PerOfHandicap','SkillRemarks', 'FirstName','MiddleName',
            'LastName','mobileNo','FullName','ProfilePhotoToShow','ProfileSignatureToShow','DateOfBirth', 'Age','Category',
            'Domicile','Handicap','TypeOfHandicap','PercentageOfHandicap','Sex','MarriedStatus',
            'CurBuildingName','CurStreetName','CurCity','CurState', 'CurDistrict','CurLandmark','CurPincode',
            'PerBuildingName', 'PerStreetName','PerCity', 'PerDistrict','PerState','PerPincode','PerLandmark','EducationalDetailsToShow',
            'professionalDetailsToShow','countEducational','countProfessional','countExperience', 'ExperienceDetailsToShow',
            'WorkshopDetailsToShow', 'countWorkshop','TrainingConductedDetailsToShow','countTrainingConducted','TrainingModuleDetailsToShow',
            'countTrainingModule','ArticleResearchDetailsToShow','countArticleResearch','LanguageProficiencyDetailsToShow',
            'countLanguageProficiency','KnowOfMSOffice','CurrentlyWorking','Statusid','aadharInput', 'pancardNo','aadharInput','PresentationSkill',
            'CommunicationSkill','CoordinationSkill','WritingSkill','TotalExperienceStepThree'));

//        return $pdf->download('ViewApplicationForm.pdf');
        return $pdf->stream('FormPdf.pdf');

//        return view('Index.Index');

    }


}
