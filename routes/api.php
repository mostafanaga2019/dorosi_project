<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(["middleware"=>['auth:sanctum']], function(){
    Route::post('/logout', [UserController::class , 'logout']);    
    Route::post('/user-data', [UserController::class , 'getUserData']); 
    Route::post('/update-user-data', [UserController::class , 'updateUserData']);
    Route::post('/update-user-personal-data', [UserController::class , 'updateUserPersonalData']);     
    
});

Route::get('/paths', [UserController::class , 'getAllPaths']);

Route::post('/register', [UserController::class , 'register']);
Route::post('/login', [UserController::class , 'login']);
Route::post('/data', [UserController::class , 'getData']); 

Route::post('/check-mail', [UserController::class , 'checkMailExist']); 

  



