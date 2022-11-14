<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ServiceController;

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

Auth::routes();

Route::get('/accueil', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/connect', [LoginController::class, 'connection'])->name('connection');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegistrationController::class, 'registerRender'])->name('register.view');
Route::post('/register', [RegistrationController::class, 'registerSubmit'])->name('register.submit');
Route::get('/user/{id}', [RegistrationController::class, 'profilRender'])->name('profil.view');
Route::post('/user/{id}/avatar', [RegistrationController::class, 'uploadAvatar'])->name('avatar.submit');
