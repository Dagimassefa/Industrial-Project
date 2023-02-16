<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
// Admin 
// Route::prefix('Admin')->middleware('auth', 'isAdmin')->group(function () {
//     Route::get('/Dashboard', function () {
//         return view('Admin.Dashboard');
//     });
// });
Route::get(
    '/Admin/Dashboard',
    [App\Http\Controllers\Admin\DashboardController::class, 'index']
)->middleware('role:Admin');

Route::get(
    '/TeamLeader/Dashboard',
    [App\Http\Controllers\TeamLeader\DashboardController::class, 'index']
)->middleware('role:TeamLeader');


Route::get(
    '/Technicians/Dashboard',
    [App\Http\Controllers\Technicians\DashboardController::class, 'index']
)->middleware('role:Technician');
// Route::get('/Users/Dashboard', 'User\DashboardController@index')->middleware('role:user');
Route::get(
    '/StaffMembers/dashboard',
    [App\Http\Controllers\StaffMembers\DashboardController::class, 'index']
)->middleware('role:user');

Route::get('/submit-support-request', function () {
    return view('StaffMembers.submit-support-request');
});
Route::get('/register-team-leader', function () {
    return view('Admin.register-team-leader');
});
Route::get('/generate-report', function () {
    return view('Admin.generate-report');
});
Route::get('/view-report', function () {
    return view('Admin.view-report');
});
Route::get('/add-tech', function () {
    return view('TeamLeader.add-tech');
});
Route::get('/new-support-request', function () {
    return view('TeamLeader.new-support-request');
});
Route::get('/add-out-of-use-devices', function () {
    return view('Technicians.add-out-of-use-devices');
});
Route::get('/generate-report', function () {
    return view('Technicians.generate-report');
});

// Route::get('/StaffMembers/dashboard', 'StaffMembers\DashboardController@index')->middleware('role:user');




Route::get('/master', function () {
    return view('CustomAuth.master');
});
Route::get('/newlogin', function () {
    return view('CustomAuth.newlogin');
});

Route::get('/newregister', function () {
    return view('CustomAuth.newregister');
});
Route::get('/newforget', function () {
    return view('CustomAuth.newforget');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
