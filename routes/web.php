<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BankDetailsController;
use App\Http\Controllers\ConversationController;

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

// HomePage
Route::get('/', function(){
    return view('welcome');
});


// Show all services
Route::get('/services/index', [ServiceController::class, 'index']);
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
Route::get('/users/{user}',[UserController::class,'account'])->middleware('auth');
//Edit user account
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
//Update user account
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');
//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show one user
Route::get('/creators/{user}', [UserController::class, 'show']);

/////////OrderController
//order create form
Route::get('/orders/create/{service}', [OrderController::class,'create'])->middleware('auth');
//order post form
Route::post('/orders', [OrderController::class,'store'])->middleware('auth');
// Show all orders of logged in user
Route::get('/users/account/orders', [OrderController::class, 'manageClient']);
// Show all requests if you are creator
Route::get('/users/account/commissions', [OrderController::class, 'manageCreator']);
// update order status
Route::put('/orders/{order}', [OrderController::class, 'updateStatus']);
// Delete order
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->middleware('auth');

// DEVELOPMENT DELETE LATER
Route::get('/login-as-user/{userId}', [OrderController::class, 'loginAsUser']);


//*ConversationController
//Open conversation
Route::get('/users/account/chat/conversation/{contactId}',[ConversationController::class,'create'])->middleware('auth');
//Create conversation
Route::get('/users/account/chat/{contactId}', [ConversationController::class, 'createChat'])->middleware('auth');
//Polling conversation
Route::get('/users/account/chat/conversation/poll/{conversationId}', [ConversationController::class, 'pollConversation'])->middleware('auth');


//*MessageController
//Create new message
Route::post('/users/account/chat/conversation', [MessageController::class, 'store'])->middleware('auth');

//BankDetailController
//create bank_details
Route::get('/register/{user}/bankDetails',[BankDetailsController::class,'create']);
//store bank_details
Route::post('/bankDetails',[BankDetailsController::class,'store']);

//payments
//payment_page
Route::post('/payment/{order}/session', [PaymentController::class, 'session'])->name('session');

//payment_success
Route::get('/payment/{order}/success', [PaymentController::class, 'success'])->name('success');

