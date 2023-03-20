<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Account_User;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionIndex;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout',[HomeController::class,'logout'])->name('login.check');


// Account Page
Route::get('/home', [App\Http\Controllers\AccountController::class, 'index'])->name('home');

Route::post('/add_accounts',[AccountController::class,'create']);

Route::view('add_accounts', 'add_accounts');
Route::get('/deleteaccount/{account_id}',[AccountController::class, 'destroy'])->name('destroy');

Route::get('edit/{id}',[AccountController::class, 'edit'])->name('edit');
Route::put('update/{id}', [AccountController::class, 'update'])->name('update');

// User page
Route::view('/users/add_users/{id}', 'add_users');

Route::get('/users/{id}', [App\Http\Controllers\Account_User::class, 'index'])->name('users');
Route::post('/users/add_users/{id}', [App\Http\Controllers\Account_User::class, 'create'])->name('users');

Route::get('/deleteuser/{user_id}',[Account_User::class, 'destroy'])->name('destroy');

Route::get('edituser/{id}',[Account_User::class, 'edit'])->name('edit');
Route::put('users/update/{id}', [Account_User::class, 'update'])->name('update');

Route::view('editform', 'editform');

// Transaction Page

Route::get('/transaction/{id}',[TransactionController::class, 'index'])->name('index');

Route::post('/transaction/add_transaction/{id}',[TransactionController::class,'store']);
Route::get('/transaction/add_transaction/{id}',[TransactionController::class,'create']);

Route::get('/deletetransaction/{id}',[TransactionController::class, 'destroy'])->name('destroy');

Route::get('editTransaction/{id}',[TransactionController::class, 'edit'])->name('edit');

Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('update');



Route::post('transaction',[TransactionController::class,'showTransaction']);

Route::post('index',[TransactionController::class,'showtransaction']);

Route::get('index', [TransactionController::class, 'show'])->name('index.show');











?>