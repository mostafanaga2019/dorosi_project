<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');   
    Artisan::call('config:cache');  
    Artisan::call('view:cache');
    return "Cache is cleared";
});

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {   
    Route::get('/subjects/{term_id}/{stage_id}/{class_id}/{subject_id}' , '\App\Http\Livewire\Admin\AdminDashboardSubjects')->name('subjects');
    Route::get('/summary/{term_id}/{stage_id}/{class_id}/{subject_id}/{lesson_id}' , '\App\Http\Livewire\Admin\AdminDashboardSummary')->name('summary');
    Route::get('/video/{term_id}/{stage_id}/{class_id}/{subject_id}/{lesson_id}' , '\App\Http\Livewire\Admin\AdminDashboardVideo')->name('video');
  
    Route::get('/clients/{stage_id}/{keyword?}' , '\App\Http\Livewire\Admin\AdminDashboardClient')->name('clients');
    Route::get('/privacy' , '\App\Http\Livewire\Admin\AdminDashboardPrivacy')->name('privacy');
    Route::get('/term' , '\App\Http\Livewire\Admin\AdminDashboardTerm')->name('term');
    Route::get('/about' , '\App\Http\Livewire\Admin\AdminDashboardAbout')->name('about');
    Route::get('/setting' , '\App\Http\Livewire\Admin\AdminDashboardSetting')->name('setting');


    
    Route::get('/admin/dashboard' , function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    

});




