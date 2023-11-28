<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/admin_dashboard', function () {
    return view('DashboardAdmin');
});


Route::get('/violation_records', function () {
    return view('ViolationRecords');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/review_testimonies', function () {
    return view('testimonies');
});

Route::post('/authenticate_user', [LoginController::class, 'authenticate']);


//admin route
Route::get('/users_get', [UserController::class, 'getUsers']);
Route::post('/create_user', [UserController::class, 'createUser']);
