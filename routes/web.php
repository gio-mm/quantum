<?php

use App\Http\Controllers\adminIndex;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
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
    return view('home');
});
Route::view('/register','registration');
Route::view('/login','login');

Route::get('/logout', function () {
    Session::forget("user");
    return redirect('/');
});

Route::middleware([customAuth::class])->group(function () {
    Route::get('/info',[UserController::class,'userinfo']);//->middleware('customAuth');
    Route::view('/basicCourse','pages/basicCourse');
});

Route::get('/si',[UserController::class,'userinfo']);

Route::post('/register',[UserController::class,'register']);
Route::post('/verificationCode', [UserController::class,'verifymail']);

Route::post('/login',[UserController::class,'login']);


//admin
Route::get('/admin',[adminIndex::class,'index']);


