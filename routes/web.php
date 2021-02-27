<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMessages;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserGroupController;

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

Route::get('/',[PageController::class,'home']);
Route::view('/register','registration');
Route::view('/login','login');

Route::get('/logout', function () {
    Session::forget("user");
    return redirect('/');
});

Route::post('/register',[UserController::class,'register']);
Route::post('/verificationCode', [UserController::class,'verifymail']);
Route::post('/login',[UserController::class,'login']);


Route::middleware([customAuth::class])->group(function () {
    Route::get('/info',[UserController::class,'userinfo']);//->middleware('customAuth');
    Route::get('/c/{category}',[UserGroupController::class,'groupInfo']);
    Route::get('/basicCourse/join/{t}/{g}',[UserMessages::class,'basicCourse']);//need mddleware
});

//admin
Route::prefix('admin')->group(function () {
    
    Route::get('/',[adminController::class,'index']);
    Route::resources([
        '/posts' => PostController::class,
        '/groups'=> GroupController::class,
    ]); 
    Route::resource('/course', CourseController::class)->only(['create','store']);
 

    Route::get('/addMember',[adminController::class,'addMemberPage']);
    Route::post('/addMember',[adminController::class,'addMember']);
    Route::get('/addMember/{id}',[UserMessages::class,'addUserToGroup'])->where('id', '[0-9]+');

    Route::post('/userRequest/reply',[UserMessages::class,'reply']);



    Route::get('/search',[adminController::class,'search']);

    

});



