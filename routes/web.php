<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/home-page', [AuthController::class, 'showHomePage'])->name('home-page');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forms', [FormController::class, 'getForm']);

Route::post('/form-submit', function (\Illuminate\Http\Request $request) {
    dd($request->all());
})->name('form.submit');
