<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SanctionController;
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


Route::get('/admin_violation_records', function () {
    return view('admin.admin_violation_records');
});

Route::get('/admin_sanction_list', function () {
    return view('admin.admin_sanction_list');
});

Route::get('/admin_users_list', function () {
    return view('admin.admin_users_list');
});

Route::get('/admin_validation', function () {
    return view('admin.admin_validation');
});
Route::get('/violation1_list', function () {
    return view('admin.violation_list');
});
Route::get('/admin_violation_sanction', function () {
    return view('admin.admin_violation_sanction');
});

// CLERK ROUTES
Route::get('/clerk_dashboard', function () {
    return view('clerk.clerk_dashboard');
});


Route::get('/clerk_violation_records', function () {
    return view('clerk.clerk_violation_records');
});

Route::get('/clerk_validation', function () {
    return view('clerk.clerk_violation_validation');
});

Route::get('/clerk_violation_sanction', function () {
    return view('clerk.clerk_violation_sanction');
});
Route::get('/clerk_sanction_list', function () {
    return view('clerk.clerk_sanction_list');
});

//Violation Officer ROUTES
Route::get('/violation_officer_dashboard', function () {
    return view('violationofficer.violation_officer_dashboard');
});
Route::get('/violation_officer_violation_records', function () {
    return view('violationofficer.violation_officer_violation_records');
});
Route::get('/violation_officer_violation_sanction', function () {
    return view('violationofficer.violation_officer_violation_sanction');
});
Route::get('/violation_officer_sanction_list', function () {
    return view('violationofficer.violation_officer_sanction_list');
});


//login route
Route::post('/authenticate_user', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

//violation route
Route::get('/users_get', [UserController::class, 'getUsers']);
Route::post('/create_user', [UserController::class, 'createUser']);
Route::get('/get_students', [UserController::class, 'getStudents']);
Route::post('/create_violation', [ViolationController::class, 'createViolation']);
Route::get('/getViolations', [ViolationController::class, 'getViolation']);
Route::post('/create_testimony', [ViolationController::class, 'createTestimony']);
Route::get('/getTestimony', [ViolationController::class, 'getTestimony']);
Route::delete('/delete_violation/{violation}', [ViolationController::class, 'deleteViolation']);
Route::get('/fetch_update_violation_record/{id}', [ViolationController::class, 'getUpdateViolationRecord']);
Route::put('/updateViolation/{id}', [ViolationController::class, 'updateViolation']);
Route::put('/updateViolationStatus/{id}/{decision}', [ViolationController::class, 'updateViolationStatus']);
Route::get('/fetch_violation_type', [ViolationController::class, 'getViolationType']);

//validation route
// Route::get('/fetch_violation_record/{id}', [ViolationController::class, 'getViolationForValidation']);
Route::get('/sanction_list', [ViolationController::class, 'getSanctionList']);
Route::put('/add_sanction', [ViolationController::class, 'addSanction']);

//sanction route
Route::get('/fetch_violation_sanction_list', [SanctionController::class, 'getViolationListWithSanction']);