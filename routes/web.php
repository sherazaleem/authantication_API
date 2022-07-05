<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AjaxUploadController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\home\AuthController;
use App\Http\Controllers\Video\VideoController;
use App\Http\Controllers\notes\notesController;
use App\Http\Controllers\recipients\recipientsController;
use App\Http\Controllers\Voice\VoiceController;
use App\Http\Controllers\Text\TextController;
use App\Http\Controllers\Trash\TrashController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\notes\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;




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

Route::get('/', function () {
    return view('welcome');
});

// 
Route::get('/reset-password-form/{token}',function ($token){
   
   return view('auth.passwords.reset',compact('token'));
});
// 
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
 // ////// pasword change
Route::group(['middleware' => ['auth:sanctum']],
 function (){ 
   Route::get('/profile/{id}',[ChangePasswordController::class,'profile']);
    Route::post('profile_update',[ChangePasswordController::class,'profile_update']);

});
// ////// pasword forgot

Route::get('reset_password',[ChangePasswordController::class,'reset_send_link']);
Route::post('forgot',[ChangePasswordController::class,'forgot']);



// 

// 

// 

// /////// dashboard

 Route::prefix('/notes')->group(function(){
    Route::get('/',[notesController::class,'show']);
 
});

 Route::prefix('/text')->group(function(){
    Route::get('/',[TextController::class,'show']);
    Route::get('/add',[TextController::class,'add']);
    Route::post('/added',[TextController::class,'added']);
    Route::get('/update/{id}',[TextController::class,'update']);
    Route::post('/updated/{id}',[TextController::class,'updated']);
    Route::get('/deleted/{id}',[TextController::class,'deleted']);


 
});

Route::prefix('/voice_notes')->group(function(){
    Route::get('/',[VoiceController::class,'show']);
    Route::get('/add',[VoiceController::class,'add']);
    Route::get('/update',[VoiceController::class,'update']);
    Route::get('/deleted/{id}',[VoiceController::class,'deleted']);
 
});

 Route::prefix('/video_notes')->group(function(){
    Route::get('/',[VideoController::class,'show']);
    Route::get('/add',[VideoController::class,'add']);
    Route::post('/added',[VideoController::class,'added']);
    Route::get('/update',[VideoController::class,'update']);
    Route::get('/deleted/{id}',[VideoController::class,'deleted']);
 
});


 Route::prefix('/recipients')->group(function(){
    Route::get('/',[recipientsController::class,'show']);
    Route::get('/add',[recipientsController::class,'add']);
    Route::post('/added',[recipientsController::class,'added']);
    Route::get('/update/{id}',[recipientsController::class,'update']);
    Route::post('/updated/{id}',[recipientsController::class,'updated']);
    Route::get('/deleted/{id}',[recipientsController::class,'deleted']);


 
});

 Route::prefix('/trash')->group(function(){
    Route::get('/',[TrashController::class,'show']);
    Route::get('/restore/{id}',[TrashController::class,'restore']);
    Route::get('/permanently_delete/{id}',[TrashController::class,'permanently_delete']);



 
});

Route::get('/ajax_upload/action',[AjaxUploadController::class,'audio_action'])->name('ajaxupload.action');

Route::get('/video_upload/action',[AjaxUploadController::class,'video_action']);

Route::get('/send-email',[ChangePasswordController::class,'sendEmail']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 
// 
// /////   login

// Route::get('/', [AuthController::class, 'login']);

Route::get('user/register', [AuthController::class, 'register']);

Route::get('user/changepassword', [AuthController::class, 'changepassword']);


