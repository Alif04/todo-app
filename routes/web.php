<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
Route::middleware('isGuest')->group(function(){
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/register', [TodoController::class, 'register'])->name('register-page');
    Route::get('/login', [TodoController::class, 'login']);
    Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register.input');
    Route::post('/login/auth', [TodoController::class, 'auth'])->name('login.auth');
});

Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard', [TodoController::class, 'dashboard']);
    Route::get('/maketodo', [TodoController::class, 'maketodo']);
    Route::get('/showtodo', [TodoController::class, 'showtodo']);  
    Route::post('/store', [TodoController::class, 'store']);  
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');      
    // method route untuk mengubah data di database itu patch
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');      
    Route::get('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');      
    Route::patch('/complated/{id}', [TodoController::class, 'updateComplated']);      

});

Route::get('/logout', [TodoController::class, 'logout']);



