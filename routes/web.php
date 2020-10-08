<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/listcustomer', [CustomerController::class, 'listcustomer'])->name('listcustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/addcustomer', [CustomerController::class, 'addcustomer'])->name('addcustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/savecustomer', [CustomerController::class, 'savecustomer'])->name('savecustomer');
Route::middleware(['auth:sanctum', 'verified'])->get('/editcustomer/{id}', [CustomerController::class, 'editcustomer'])->name('editcustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/updatecustomer/{id}', [CustomerController::class, 'updatecustomer'])->name('updatecustomer');
Route::middleware(['auth:sanctum', 'verified'])->post('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');
