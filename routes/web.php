<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViolationController;
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

// ADMIN ROUTES

Route::get('/', function () {
    return view('login');
});

Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard');
});


Route::get('/violation_records', function () {
    return view('admin.violation_records');
});

Route::get('/violation_list', function () {
    return view('admin.violation_list');
});

Route::get('/users_list', function () {
    return view('admin.admin_users_list');
});

Route::get('/validation', function () {
    return view('admin.admin_validation');
});
Route::get('/violation1_list', function () {
    return view('admin.violation_list');
});

// CLERK ROUTES


Route::get('/clerk_dashboard', function () {
    return view('clerk.clerk_dashboard');
});


Route::get('/clerk_violation_records', function () {
    return view('clerk.clerk_violation_records');
});

Route::get('/clerk_violation_list', function () {
    return view('clerk.clerk_violation_list');
});

Route::get('/clerk_review', function () {
    return view('clerk.clerk_review_testimonies');
});
Route::get('/violation1_list', function () {
    return view('clerk.clerk_violation_list');
});

//Violation Officer ROUTES


// Route::get('/violation_records', function () {
//     return view('violation_officer.violation_officer_violation_records');
// });


Route::post('/authenticate_user', [LoginController::class, 'authenticate']);
//admin route
Route::get('/users_get', [UserController::class, 'getUsers']);
Route::post('/create_user', [UserController::class, 'createUser']);
Route::get('/get_students', [UserController::class, 'getStudents']);
Route::post('/create_violation', [ViolationController::class, 'createViolation']);
Route::get('/getViolations', [ViolationController::class, 'getViolation']);
Route::post('/create_testimony', [ViolationController::class, 'createTestimony']);
Route::get('/getTestimony', [ViolationController::class, 'getTestimony']);
