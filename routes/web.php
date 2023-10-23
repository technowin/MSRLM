<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AccountController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',
    [AccountController::class,'LogIn']
);

//---------------------------------------Account----------------------------------------------------------//

Route::get('UserSignUp',[AccountController::class,'UserSignUp'])->name('UserSignUp');
Route::get('LogIn',[AccountController::class,'LogIn'])->name('LogIn');
Route::get('logout',[AccountController::class,'logout'])->name('logout');
Route::get('OTPScreen/{data}/{data1}/{data2}',[AccountController::class,'OTPScreen'])->name('OTPScreen');
Route::get('OTPScreenForLogIn/{data}',[AccountController::class,'OTPScreenForLogIn'])->name('OTPScreenForLogIn');
Route::get('generateOTP',[AccountController::class,'generateOTP'])->name('generateOTP');
Route::get('toCheckEmail/{data}',[AccountController::class,'toCheckEmail'])->name('toCheckEmail');

Route::post('PostUserSignUp',[AccountController::class,'PostUserSignUp'])->name('PostUserSignUp');
Route::post('PostUserLogIn',[AccountController::class,'PostUserLogIn'])->name('PostUserLogIn');
Route::post('PostOTPScreenEmail',[AccountController::class,'PostOTPScreenEmail'])->name('PostOTPScreenEmail');
Route::post('PostOTPScreenLogin',[AccountController::class,'PostOTPScreenLogin'])->name('PostOTPScreenLogin');

Route::post('CheckUserIdAvailable',[AccountController::class,'CheckUserIdAvailable'])->name('CheckUserIdAvailable');




//---------------------------------------Index------------------------------------------------------------//

Route::get('/Index', 'IndexController@Index')->name('Index.Index');
Route::get('/Dashboard', 'IndexController@Dashboard')->name('Index.Dashboard');
Route::get('ViewApplicationForm',[IndexController::class,'ViewApplicationForm'])->name('ViewApplicationForm');

Route::post('PostProfilePhoto',[IndexController::class,'PostProfilePhoto'])->name('PostProfilePhoto');
Route::post('PostProfileSignature',[IndexController::class,'PostProfileSignature'])->name('PostProfileSignature');
Route::post('PartISubmit',[IndexController::class,'PartISubmit'])->name('PartISubmit');
Route::post('PartIISubmit',[IndexController::class,'PartIISubmit'])->name('PartIISubmit');
Route::post('PartIIISubmit',[IndexController::class,'PartIIISubmit'])->name('PartIIISubmit');
Route::post('DeleteRowFromTable',[IndexController::class,'DeleteRowFromTable'])->name('DeleteRowFromTable');

Route::post('PartIVDeclarationSubmit',[IndexController::class,'PartIVDeclarationSubmit'])->name('PartIVDeclarationSubmit');
Route::get('generatePDF',[IndexController::class,'generatePDF'])->name('generatePDF');



