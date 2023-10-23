<?php

namespace App\Http\Controllers;

use App\Models\CityMasterModel;
use App\Models\CommonModel;
use App\Models\DatabaseModel;
use App\Models\DepartmentMasterModel;
use App\Models\DistrictMasterModel;
use App\Models\ErrorLogModel;
use App\Models\IncrementModel;
use App\Models\LoanMasterModel;
use App\Models\PayBandModel;
use App\Models\StateMasterModel;
use App\Models\LanguageMasterModel;
use App\Models\ReligionMasterModel;
use App\Models\CasteMasterModel;
use App\Models\StatusMasterModel;
use App\Models\TalukaMasterModel;
use App\Models\TrainingMasterModel;
use App\Models\ExaminationMasterModel;
use App\Models\SubcasteModel;

use App\Models\QualificationModel;
use App\Models\BankMasterModel;
use App\Models\BranchMasterModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CommonController extends Controller
{

    private $dbConnection ;
    public function getDBName()
    {
        //$Database = DatabaseModel::select('DB')->get()->first();
        return $this->dbConnection = session()->get('Database');
    }
    public function ErrorLogging(\Exception $exception, $controllerName, $methodName)
    {
        $model = new ErrorLogModel();
        $model->setConnection($this->getDBName());
        $model->ControllerName = $controllerName;
        $model->MethodName = $methodName;
        $model->Message = $exception->getMessage();
        $model->ErrorTime = Carbon::now(new \DateTimeZone('Asia/Kolkata'));
        $model->UserId = session()->get('LoggedUser');
        $model->save();
    }

//    public function GetListFromCommonMaster(Request $request)
//    {
//        try{
//            $list = CommonModel::on($this->getDBName())->select('parametercode','parametervalue_eng','parametervalue_mar')->where('parametername',$request->parameter)->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'GetListFromCommonMaster');
//            return 'Some error occurred while processing your request.';
//        }
//    }
//
//    public function StateMaster(Request $request)
//    {
//        try{
//            $list = StateMasterModel::on($this->getDBName())->select('statemasterid','statename','statename_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'StateMaster');
//            return 'Some error occurred while processing your request in StateMaster';
//        }
//    }
//    public function DistrictMaster(Request $request)
//    {
//        try{
//            $list = DistrictMasterModel::on($this->getDBName())->select('districtmasterid','districtname','districtname_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'DistrictMaster');
//            return 'Some error occurred while processing your request in DistrictMaster';
//        }
//    }
//
//
//
//    public function TalukaMaster(Request $request)
//    {
//        try{
//            $list =TalukaMasterModel::on($this->getDBName())->select('talukaid','talukaname', 'talukaname_mar', 'districtmasterid')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'TalukaMaster');
//            return 'Some error occurred while processing your request in TalukaMaster';
//        }
//    }
//
//    public function CityListCityMaster(Request $request)
//    {
//        try{
//            $list = CityMasterModel::on($this->getDBName())->select('citymasterid','CityName','CityName_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'CityListCityMaster');
//            return 'Some error occurred while processing your request in CityMaster';
//        }
//    }
//
//
//for propertdetails new function
//    public function CityForPropertyDetails(Request $request)
//    {
//        try{
//            $list = CityMasterModel::on($this->getDBName())->select('citymasterid','CityName','CityName_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'CityForPropertyDetails');
//            return 'Some error occurred while processing your request in CityMaster';
//        }
//    }
//        public function DistrictForPropertyDetails(Request $request)
//    {
//        try{
//            $list = DistrictMasterModel::on($this->getDBName())->select('districtmasterid','districtname','districtname_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'DistrictForPropertyDetails');
//            return 'Some error occurred while processing your request in DistrictMaster';
//        }
//    }
//        public function StateForPropertyDetails(Request $request)
//    {
//        try{
//            $list = StateMasterModel::on($this->getDBName())->select('statemasterid','statename','statename_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'StateForPropertyDetails');
//            return 'Some error occurred while processing your request in StateMaster';
//        }
//    }
//
//
//// Loan For
//    public function LoanFor(Request $request)
//    {
//        try{
//            $list = LoanMasterModel::on($this->getDBName())->select('loan_id','loan_desc','loan_desc_mar')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'LoanFor');
//            return 'Some error occurred while processing your request in LoanFor';
//        }
//    }
//    public function LoanInterestRate(Request $request) {
//        try {
//            $employeeIndex =  DB::connection($this->getDBName())->select('CALL stp_getloanInterestRate(?)',array($request->loanId));
//            return response()->json($employeeIndex);
//        } catch (\Exception $ex) {
//            $this->ErrorLogging($ex, 'CommonController', 'LoanFor');
//            return 'Some error occurred while processing your request';
//        }
//    }

















// for dependent
    public function StateMaster(Request $request)
    {
        try{
            $list = StateMasterModel::on($this->getDBName())->select('statemasterid','statename','statename_mar')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'StateMaster');
            return 'Some error occurred while processing your request in StateMaster';
        }
    }
    public function DistrictMaster(Request $request)
    {
        try{
            $list = DB::connection($this->getDBName())->select('CALL stp_GenerateDistrictDropdown(?)',array($request->stateid));
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'DistrictMaster');
            return 'Some error occurred while processing your request in DistrictMaster';
        }
    }



    public function TalukaMaster(Request $request)
    {
        try{
            $list =DB::connection($this->getDBName())->select('CALL stp_GenerateTalukaDropdown(?)',array($request->districtid));
            return response()->json($list);

        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'TalukaMaster');
            return 'Some error occurred while processing your request in TalukaMaster';
        }
    }

    public  function CityListCityMaster(Request $request)
    {
        try{
            $list =DB::connection($this->getDBName())->select('CALL stp_GenerateCityDropDown(?)',array($request->talukaid));
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'CityListCityMaster');
            return 'Some error occurred while processing your request in CityMaster';
        }
    }


    //Insert into State=>District=>Taulka=>City Master's


    public static function InsertStateMaster(Request $request)
    {
        try{

            $statename = $request->NewState;
            $statename_mar = $request->StateMar;



            $data=DB::select('CALL stp_InsertIntoStateMaster(?,?)',array($statename, $statename_mar));

            return  $data[0]->statemasterid;
        }
        catch (\Exception $exception)
        {
            $common = new CommonController();
            $common->ErrorLogging($exception, "CommonController","InsertStateMaster");
            return "Some error occurred while processing your request";
        }
    }



    public static function  InsertDistrictMaster(Request $request,$stateid)
    {
        try{

            $districtname = $request->NewDistrict;
            $districtname_mar = $request->DistrictMar;
            $statemasterid1=$stateid;



            $data=DB::select('CALL stp_InsertIntoDistrictMaster(?,?,?)',array($districtname, $districtname_mar,$statemasterid1));

            return   $data[0]->districtmasterid;
        }
        catch (\Exception $exception)
        {
            $common = new CommonController();
            $common->ErrorLogging($exception, "CommonController","InsertDistrictMaster");
            return "Some error occurred while processing your request";
        }
    }


    public static function InsertTalukaMaster(Request $request,$districtid)
    {
        try{

            $talukaname = $request->NewTaluka;
            $talukaname_mar = $request->TalukaMar;
            $districtid1=$districtid;


            $data=DB::select('CALL stp_InsertIntoTalukaMaster(?,?,?)',array($talukaname, $talukaname_mar,$districtid1));

            return  $data[0]->talukaid;
        }
        catch (\Exception $exception)
        {
            $common = new CommonController();
            $common->ErrorLogging($exception, "CommonController","InsertTalukaMaster");
            return "Some error occurred while processing your request";
        }
    }



    public static function InsertCityMaster(Request $request,$talukaid)
    {
        try{

            $CityName = $request->NewCity;
            $CityName_mar = $request->CityMar;
            $talukaid1=$talukaid;



            $data=DB::select('CALL stp_InsertIntoCityMaster(?,?,?)',array($CityName, $CityName_mar,$talukaid1));

            return  $data[0]->citymasterid;
        }
        catch (\Exception $exception)
        {
            $common = new CommonController();
            $common->ErrorLogging($exception, "CommonController","InsertCityMaster");
            return "Some error occurred while processing your request";
        }
    }

    public function LanguageMaster(Request $request)
    {
        try{
            $list = LanguageMasterModel::on($this->getDBName())->select('LanguageId','LanguageName', 'LanguageName_Mar')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'LanguageMaster');
            return 'Some error occurred while processing your request in LanguageMaster';
        }
    }
    public function CasteMaster(Request $request)
    {
        try{
            $list = CasteMasterModel::on($this->getDBName())->select('CasteId','CasteName','CasteName_mar')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'CasteMaster');
            return 'Some error occurred while processing your request in CasteMaster';
        }
    }
    public function ReligionMaster(Request $request)
    {
        try{
            $list = ReligionMasterModel::on($this->getDBName())->select('ReligionId','ReligionName','ReligionName_Mar')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'ReligionMaster');
            return 'Some error occurred while processing your request in ReligionMaster';
        }
    }
    public function SubCasteMaster(Request $request)
    {
        try{
//            $list = SubcasteModel::on($this->getDBName())->select('SubCasteId','subcastename','subcastename_mar')->get();
            $list = SubcasteModel::on($this->getDBName())->select('SubCasteId','subcastename','subcastename_mar')->where('casteId',$request['casteId'])->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'SubCasteMaster');
            return 'Some error occurred while processing your request in SubCasteMaster';
        }
    }
    public function DepartmentMaster(Request $request)
{
    try{
        $list = DepartmentMasterModel::on($this->getDBName())->select('departmentcode','departmentname_eng','departmentname_mar')->get();

        return response()->json($list);
    }
    catch (\Exception $ex){
        $this->ErrorLogging($ex, 'DepartmentController', 'DepartmentMaster');
        return 'Some error occurred while processing your request in DepartmentMaster';
    }
}

    public function  StatusList(Request $request) {
        try{
            $list = StatusMasterModel::on($this->getDBName())->select('StatusIdNumber','StatusShortName','StatusShortName_mar')->where('StatusType',$request->statusType)->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'StatusList');
            return 'Some error occurred while processing your request in EmploymentStatusChange';
        }

    }
    public function  QualificationMaster(Request $request) {
        try{
            $list = QualificationModel::on($this->getDBName())->select('ProgramId','qualificationid','qualificationname','qualificationname_mar')->where('ProgramId',$request['ProgramId'])->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'QualificationMaster');
            return 'Some error occurred while processing your request in QualificationMaster';
        }


    }




    public function BankMaster(Request $request)
    {
        try{
            $list = BankMasterModel::on($this->getDBName())->select('bank_id','bank_name','bank_name_mar')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'BankMaster');
            return 'Some error occurred while processing your request in CommonController';
        }
    }
    public function BranchMaster(Request $request)
    {
        try{
            $list = DB::connection($this->getDBName())->select('CALL stp_GenerateBranchDropdown(?)',array($request->bankId));
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'BankMaster');
            return 'Some error occurred while processing your request in CommonController';
        }
    }


    public function TrainingMaster(Request $request)
    {
        try{
            $list = TrainingMasterModel::on($this->getDBName())->select('Trainingid','TraningName')->get();
            return response()->json($list);
        }
        catch (\Exception $ex){
            $this->ErrorLogging($ex, 'CommonController', 'TrainingMaster');
            return 'Some error occurred while processing your request in CommonController';
        }
    }
//    public function BranchMaster(Request $request)
//    {
//        try{
//            $list = DB::select('CALL stp_GenerateBranchDropdown');
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'BankMaster');
//            return 'Some error occurred while processing your request in CommonController';
//        }
//    }
//    public function BranchMaster(Request $request)
//    {
//        try{
//            $list = DB::connection($this->getDBName())->select('CALL stp_GenerateBranchDropdown(?)',array($request->bankId));
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'BankMaster');
//            return 'Some error occurred while processing your request in CommonController';
//        }
//    }

//    public function ExaminationMaster(Request $request)
//    {
//        try{
//            $list =ExaminationMasterModel::on($this->getDBName())->select('Examid','ExamName')->get();
//            return response()->json($list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'ExaminationMaster');
//            return 'Some error occurred while processing your request in ExaminationMaster';
//        }
//    }
//
//    public function  PayBandMaster(Request $request) {
//        try{
//            $list = DB::connection($this->getDBName())->select("SELECT PaybandName,Lower_Limit, Upper_Limit, PaybandName as paybandmar FROM tblpaybandmaster");
//            $emp = new EmployeeSalaryController();
//            foreach ($list as $item)
//            {
//                $item->paybandmar = $emp->convertToUnicodeNumber($item->paybandmar);
//            }
//            return response()->json( $list);
//        }
//        catch (\Exception $ex){
//            $this->ErrorLogging($ex, 'CommonController', 'PayBandMaster');
//            return 'Some error occurred while processing your request in PayBandMaster';
//        }
//    }





}
