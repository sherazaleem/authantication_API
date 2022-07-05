<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;
use App\Http\Controllers\schedule_noteController;
use App\Http\Controllers\recipientsController;
use App\Http\Controllers\schedule_recipientsController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\DocumentContoller;
use App\Http\Controllers\AjaxUploadController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']],
 function (){ 
    Route::get('/profile', function(Request $request){return $request->user();});

    
    // 
    Route::prefix('notes')->group(function(){
    Route::get('/',[noteController::class,'show']);
    Route::post('/',[noteController::class,'Add']);
    Route::put('/{id}',[noteController::class,'update']);
    Route::delete('/{id}',[noteController::class,'delete']); 
    // 
});
    
    // API route for logout user
Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
Route::post('/changepassword', [noteController::class, 'change_password']);



});


Route::prefix('schedule_notes')->group(function(){
    Route::get('/',[schedule_noteController::class,'show']);
    Route::post('/',[schedule_noteController::class,'Add']);
    Route::put('/{id}',[schedule_noteController::class,'update']);
    Route::delete('/{id}',[schedule_noteController::class,'delete']);
    
});


Route::prefix('recipients')->group(function(){
    Route::get('/',[recipientsController::class,'show']);
    Route::post('/', [recipientsController::class, 'Add']);
    Route::put('/{id}',[recipientsController::class,'update']);
    Route::delete('/{id}',[recipientsController::class,'delete']);
    
});


Route::prefix('schedule_recipients')->group(function(){
    Route::get('/',[schedule_recipientsController::class,'show']);
   Route::post('/',[schedule_recipientsController::class, 'Add']);
   Route::put('/{id}',[schedule_recipientsController::class,'update']); 
   Route::delete('/{id}',[schedule_recipientsController::class,'delete']); 
});

  Route::get('/ajax_upload/action',[AjaxUploadController::class,'action']);

Route::post('/password/email',[ForgotPasswordController::class,"sendResetLinkEmail"]);
Route::post('/password/reset',[ResetPasswordController::class,"reset"]);



