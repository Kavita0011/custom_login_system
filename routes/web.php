<?php

use App\Http\Controllers\user_authenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// start of routing
Route::get('/', function () {
    return redirect('index');
});
// route for dashboard
Route::get('dashboard',[user_authenticate::class,'dashboard'])->middleware('is_logged_in');
// route for login and register
Route::post('user_login',[user_authenticate::class,'user_login']);
Route::post('user_register',[user_authenticate::class,'user_register']);
Route::get('index',[user_authenticate::class,'login'])->middleware('already_logged_in');
Route::get('register',[user_authenticate::class,'register']);
Route::get('/logout',[user_authenticate::class,'logout']);
// end of routing