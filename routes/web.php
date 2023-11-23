<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::prefix('my_profile')->middleware(['auth','user','pending'])->name('user.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');    
});

Route::prefix('approved_users')->middleware(['auth','admin'])->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');   
    Route::put('/approved/{id_user}', [AdminController::class, 'approved'])->name('approved');   
    Route::put('/cancel/{id_user}', [AdminController::class, 'cancel'])->name('cancel');   
    Route::get('/history', [AdminController::class, 'history'])->name('history');   
});

