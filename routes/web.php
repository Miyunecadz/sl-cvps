<?php

use App\Models\Person;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportsController;
use App\Models\Vaccination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewAddUserAdminController;

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

Route::resource('admin', AdminController::class);

Route::get('/register', [RegistrationController::class, 'view'])->name('person.register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::resource('admin', AdminController::class);

Route::get('/reports',[ReportsController::class,'index'])->name('superadmin.reports');

Route::get('/add-new-user',[ViewAddUserAdminController::class,'view']);