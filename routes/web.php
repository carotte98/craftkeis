<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BankDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;

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
// Route::get('/', function(){
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

//*ADMIN 
// Delete user
Route::delete('/users/1/delete/{user}', [UserController::class, 'destroy'])->middleware('auth');
// Show edit user
Route::get('/users/1/edit/{user}', [UserController::class, 'showEditUser'])->middleware('auth');
// Show create user account
Route::get('/users/1/create', [UserController::class, 'showCreateUser'])->middleware('auth');
//Create user account
Route::post('/users/1', [UserController::class, 'createUser'])->middleware('auth');
// Show user conversation
Route::get('/users/1/{conversationId}', [UserController::class, 'showConversation'])->middleware('auth');
// Delete conversation messages
Route::delete('/users/1/delete-conversation/{conversationId}', [UserController::class, 'clearConversation'])->middleware('auth');
//Update user account
Route::put('/users/1/edit/{user}', [UserController::class, 'updateUser'])->middleware('auth');
//*ADMIN BANK
Route::get('/users/1/bank-create/{user}', [BankDetailsController::class, 'adminCreate'])->middleware('auth');
//Create user account
Route::post('/users/1/bank-create/{user}', [BankDetailsController::class, 'adminStore'])->middleware('auth');
//*ADMIN SERVICES
// Update Service
Route::put('/users/1/update-service/{service}/update', [ServiceController::class, 'updateUserService'])->middleware('auth');
// Show Update Service
Route::get('/users/1/update-service/{service}', [ServiceController::class, 'showUpdateService'])->middleware('auth');

//*END ADMIN

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

//*MessageController
//Create new message
Route::post('/users/account/chat/conversation', [MessageController::class, 'store'])->middleware('auth');


//*ConversationController
//Open conversation
Route::get('/users/account/chat/conversation/{contactId}',[ConversationController::class,'create'])->middleware('auth');
//Create conversation
Route::post('/users/account/chat/{contactId}', [ConversationController::class, 'createChat'])->middleware('auth');
//Polling conversation
Route::get('/users/account/chat/conversation/poll/{conversationId}', [ConversationController::class, 'pollConversation'])->middleware('auth');



//BankDetailController
//create bank_details
Route::get('/register/{user}/bank-details',[BankDetailsController::class,'create']);
//store bank_details
Route::post('/bankDetails',[BankDetailsController::class,'store']);
//Update bank_details
Route::put('/bankDetails/{bank_details}', [BankDetailsController::class, 'update'])->middleware('auth');
//Edit bank_details
Route::get('/bankDetails/{bank_details}/edit', [BankDetailsController::class, 'edit'])->middleware('auth');

//payments
//payment_page
Route::post('/payment/{order}/session', [PaymentController::class, 'session'])->name('session');

//payment_success
Route::get('/success/{order}', [PaymentController::class, 'success'])->name('success');

//contact us
Route::get('/contact', [ContactController::class,'showForm']);
Route::post('/contact', [ContactController::class,'sendMail']);

// About Us
Route::get('/about', function(){
    return view('about');
});

