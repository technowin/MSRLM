<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPVerification;
use Illuminate\Support\Facades\Session;

class AccountController extends controller
{
    private $dbConnection;

    public function getDBName()
    {
        return $this->dbConnection = session()->get('Database');
    }

//    email To Check In Table

//    public function toCheckEmail($emailId){
//
//        try {
//
//            $StatusChange = DB::connection($this->getDBName())->select('CALL `stp_ToCheckEmail`(?)'
//                , array($emailId));
//
//            if (!empty($StatusChange)) {
//                $result = 1;
//            } else {
//                $result = 0;
//            }
//
//        }catch(\Exception $ex) {
//            $common = new CommonController;
//            $common->ErrorLogging($ex, 'AccountController', 'PostUserSignUp');
//            return 'Some error occurred while processing your request...';
//        }
//        return response()->json($result);
//    }

    public Function UserSignUp()
    {
        return view('Account.UserSignUp');
    }

    //    Post Function Signup

    public function PostUserSignUp(request $request)
    {
        try {

            $emailId = $request["emailId"];
            $phoneNumber = $request["phoneNumber"];
            $FullName = $request["FullName"];

            // Split the full name into an array of parts
//            $nameParts = explode(' ', $FullName);

            // Assuming first and last names are the first two parts
//            $FirstName = $nameParts[0];
//            $MiddleName = isset($nameParts[1]) ? $nameParts[1] : '';
//            $LastName = isset($nameParts[2]) ? $nameParts[2] : '';

            $Return =  DB::connection($this->getDBName())->select('CALL `stp_getCheckEmailForSignUp`(?)'
                , array( $emailId));

            if ($Return[0]->CHECKEmail_VAR == '0') {
                $FullName = $request["FullName"];
                $emailId = $request["emailId"];
                $phoneNumber = $request["phoneNumber"];
                $address = $request["address"];
                $CreatedBy = $request["FullName"];

                $ReturnPost =  DB::connection($this->getDBName())->select('CALL `stp_InsertIntoUsers`(?,?,?,?,?)'
                    , array($FullName, $emailId,$phoneNumber,$address,$CreatedBy));

                $a="";

                foreach ($ReturnPost as $item) {
                    $a = $item->success;
                }

                if($a == 'success'){
                    $Status = 1;
                }

            }

            if ($Return[0]->CHECKEmail_VAR == '1') {
                $Status = '0' ;
            }

        }catch(\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'AccountController', 'PostUserSignUp');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'Status' => $Status,
            'emailId' => $emailId,
            'phoneNumber' => $phoneNumber,
            'FullName' => $FullName,
        ]);
    }

    public Function LogIn()
    {
        return view('Account.LogIn');
    }

    public function PostUserLogIn(request $request){

        try{

            $emailId = $request["emailId"];

            $CheckEmailId =  DB::connection($this->getDBName())->select('CALL `stp_checkEmailToLogin`(?)'
                , array($emailId));

            if( $CheckEmailId[0]->CHECKEmailId_VAR == '1' ){
                $Status = '1';
            }

            if( $CheckEmailId[0]->CHECKEmailId_VAR == '0' ){
                $Status = '0';
            }

        }catch(\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'AccountController', 'PostUserSignUp');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'emailId' => $emailId,
            'Status' => $Status,
        ]);

    }

    public function OTPScreen($emailId, $phoneNumber, $FullNameNew){

        $otp = $this->generateOtp();
        Mail::to($emailId)->send(new OTPVerification($otp));
        DB::connection($this->getDBName())->select('CALL `stp_InsertIntoOTPScreen`(?,?)'
            , array($emailId, $otp));

        $emailIdToPost = $emailId;

        return view('Account.OTPScreen',
            compact('emailIdToPost','phoneNumber','FullNameNew'));
    }

    public function OTPScreenForLogIn($emailId){

        $otp = $this->generateOtp();
        Mail::to($emailId)->send(new OTPVerification($otp));

        DB::connection($this->getDBName())->select('CALL `stp_InsertIntoOTPScreen`(?,?)'
            , array($emailId, $otp));

        $emailIdToPost = $emailId;

        return view('Account.OTPScreenForLogIn', compact('emailIdToPost'));
    }

    public function PostOTPScreenEmail( request $request){

        try{

            $otp = $request["otp"];
            $emailId = $request["emailId"];
            $phoneNumber = $request["phoneNumber"];
            $FullName = $request["FullName"];
//            $MiddleName = $request["MiddleName"];
//            $LastName = $request["LastName"];


            $ReturnCheck =  DB::connection($this->getDBName())->select('CALL `stp_getCheckOTPInTable`(?,?)'
                , array($emailId, $otp ));

            if ($ReturnCheck[0]->CHECKNice_VAR == 'success') {

                $Status = '1' ;

                Session::put('EmailId',$emailId);

                DB::connection($this->getDBName())->select('CALL `stp_InsertAfterRegistration`(?,?,?)'
                    , array($FullName, $emailId, $phoneNumber ));

                DB::connection($this->getDBName())->select('CALL `stp_DeleteOTPAfterVerification`(?,?)'
                    , array($emailId, $otp ));

            }

            if ($ReturnCheck[0]->CHECKNice_VAR == 'unsuccess') {
                $Status = '0' ;
            }

        }catch(\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'AccountController', 'PostOTPScreenEmail');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'emailId' => $emailId,
            'status' => $Status,
        ]);
    }

    public function PostOTPScreenLogin( request $request){

        try{

            $otp = $request["otp"];
            $emailId = $request["emailId"];

            $ReturnCheck =  DB::connection($this->getDBName())->select('CALL `stp_checkOTPForLogin`(?,?)'
                , array($emailId, $otp ));

            if( $ReturnCheck[0]->CHECKEmailForLogin_VAR == 'success' ){
                $Status = 1;

                Session::put('EmailId',$emailId);

                DB::connection($this->getDBName())->select('CALL `stp_DeleteOTPAfterVerification`(?,?)'
                    , array($emailId, $otp ));
            }

            if( $ReturnCheck[0]->CHECKEmailForLogin_VAR == 'unsuccess' ){
                $Status = 0;
            }

        }catch(\Exception $ex) {
            $common = new CommonController;
            $common->ErrorLogging($ex, 'AccountController', 'PostOTPScreenLogin');
            return 'Some error occurred while processing your request...';
        }
        return response()->json([
            'emailId' => $emailId,
            'status' => $Status,
        ]);
    }

    public static function generateOTP()
    {
        $otp = strval(random_int(100000, 999999));
        return $otp;
    }

    public function logout(){
//        return view('Account.logout');
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        return redirect('/');
    }


}
