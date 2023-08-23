<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('test');
// });

// Show all services
Route::get('/', [ServiceController::class, 'index']);
// Create new service
Route::get('/services/create', [ServiceController::class, 'create'])->middleware('auth');
// Store new service
Route::post('/services', [ServiceController::class, 'store'])->middleware('auth');
// Edit service
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->middleware('auth');
// Update service
Route::put('/services/{service}', [ServiceController::class, 'update'])->middleware('auth');
// Delete service
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->middleware('auth');
// Manage services
Route::get('/services/manage', [ServiceController::class, 'manage'])->middleware('auth');
// Show one service
Route::get('/services/{service}', [ServiceController::class, 'show']);

//*UserController
//Register user (form)
Route::get('/register',[UserController::class,'create']);
//Login user (form)
//name login, for when someone wants to bypass login and go directly the account page through url then gets redirected to login
Route::get('/login',[UserController::class,'login'])->name('login');
//Create new user (db)
Route::post('/users', [UserController::class, 'store']);
//Log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//Display user account (after log-in for now)
Route::get('/users/account',[UserController::class,'account'])->middleware('auth');
//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');