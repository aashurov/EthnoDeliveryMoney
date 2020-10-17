<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\TransactionController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/listmoney', [MoneyController::class, 'listmoney'])->name('listmoney');
Route::middleware(['auth:sanctum', 'verified'])->get('/addmoney', [MoneyController::class, 'addmoney'])->name('addmoney');
Route::middleware(['auth:sanctum', 'verified'])->post('/savemoney', [MoneyController::class, 'savemoney'])->name('savemoney');
Route::middleware(['auth:sanctum', 'verified'])->get('/editmoney/{id}', [MoneyController::class, 'editmoney'])->name('editmoney');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatemoney/{id}', [MoneyController::class, 'updatemoney'])->name('updatemoney');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletemoney/{id}', [MoneyController::class, 'deletemoney'])->name('deletemoney');

Route::middleware(['auth:sanctum', 'verified'])->get('/listmoneys', [MoneyController::class, 'listmoneys'])->name('listmoneys');


Route::middleware(['auth:sanctum', 'verified'])->get('/listcustomer', [CustomerController::class, 'listcustomer'])->name('listcustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/addcustomer', [CustomerController::class, 'addcustomer'])->name('addcustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/savecustomer', [CustomerController::class, 'savecustomer'])->name('savecustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/editcustomer/{id}', [CustomerController::class, 'editcustomer'])->name('editcustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatecustomer/{id}', [CustomerController::class, 'updatecustomer'])->name('updatecustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');


Route::middleware(['auth:sanctum', 'verified'])->get('/listcourier', [CourierController::class, 'listcourier'])->name('listcourier');
Route::middleware(['auth:sanctum', 'verified'])->get('/addcourier', [CourierController::class, 'addcourier'])->name('addcourier');
Route::middleware(['auth:sanctum', 'verified'])->post('/savecourier', [CourierController::class, 'savecourier'])->name('savecourier');
Route::middleware(['auth:sanctum', 'verified'])->get('/editcourier/{id}', [CourierController::class, 'editcourier'])->name('editcourier');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatecourier/{id}', [CourierController::class, 'updatecourier'])->name('updatecourier');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletecourier/{id}', [CourierController::class, 'deletecourier'])->name('deletecourier');

Route::middleware(['auth:sanctum', 'verified'])->get('/listcurrency', [CurrencyController::class, 'listcurrency'])->name('listcurrency');
Route::middleware(['auth:sanctum', 'verified'])->get('/addcurrency', [CurrencyController::class, 'addcurrency'])->name('addcurrency');
Route::middleware(['auth:sanctum', 'verified'])->post('/savecurrency', [CurrencyController::class, 'savecurrency'])->name('savecurrency');
Route::middleware(['auth:sanctum', 'verified'])->get('/editcurrency/{id}', [CurrencyController::class, 'editcurrency'])->name('editcurrency');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatecurrency{id}', [CurrencyController::class, 'updatecurrency'])->name('updatecurrency');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletecurrency/{id}', [CurrencyController::class, 'deletecurrency'])->name('deletecurrency');


Route::middleware(['auth:sanctum', 'verified'])->get('/listtransaction', [TransactionController::class, 'listtransaction'])->name('listtransaction');
Route::middleware(['auth:sanctum', 'verified'])->get('/addtransaction', [TransactionController::class, 'addtransaction'])->name('addtransaction');
Route::middleware(['auth:sanctum', 'verified'])->post('/savetransaction', [TransactionController::class, 'savetransaction'])->name('savetransaction');
Route::middleware(['auth:sanctum', 'verified'])->get('/edittransaction/{id}', [TransactionController::class, 'edittransaction'])->name('edittransaction');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatetransaction{id}', [TransactionController::class, 'updatetransaction'])->name('updatetransaction');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletetransaction/{id}', [TransactionController::class, 'deletetransaction'])->name('deletetransaction');