<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});


//route to show register page
Route::get('/register', function () {
    return view('register');
});


//route to handle form data
Route::post('/register', [EmployeeController::class, 'store'])->name('register');


//route to show all employees with their promotion level
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
