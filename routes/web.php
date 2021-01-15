<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserMessages;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Models\Post;
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

Route::middleware([customAuth::class])->group(function () {
    Route::get('/info',[UserController::class,'userinfo']);//->middleware('customAuth');
    Route::get('/c/{category}',[UserController::class,'basicCourse']);
    Route::get('/c/course',[UserController::class,'course']);
    Route::get('/basicCourse/join/{t}/{g}',[UserMessages::class,'basicCourse']);//need mddleware
});



Route::post('/register',[UserController::class,'register']);
Route::post('/verificationCode', [UserController::class,'verifymail']);

Route::post('/login',[UserController::class,'login']);


//admin
Route::prefix('admin')->group(function () {
    
    Route::get('/',[adminController::class,'index']);

  
    Route::resources([
        '/posts' => PostController::class,
    ]); 

    // Route::get('/addNews',[adminController::class,'index']);
    Route::get('/',[adminController::class,'index']);

    Route::view('/addCourse','admin/add');
    Route::post('/addCourse',[adminController::class,'addCourse']);   

    Route::get('/addMember',[adminController::class,'addMemberPage']);
    Route::post('/addMember',[adminController::class,'addMember']);

    Route::get('/addMember/{id}',[UserMessages::class,'addUserToGroup'])->where('id', '[0-9]+');
    Route::post('/userRequest/reply',[UserMessages::class,'reply']);

    Route::get('/addGroup',[adminController::class,'addGroupPage']);
    Route::post('/addGroup',[adminController::class,'addGroup']);

    Route::get('/allGroups',[adminController::class,'allgroups']);


    Route::get('/search',[adminController::class,'search']);

    

});



