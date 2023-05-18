<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Role Resource Controller
 */
Route::resource('role', RoleController::class);

/**
 * User Resource Controller
 */
Route::resource('user', UserController::class);

/**
 * Category Resource Controller
 */
Route::resource('category', CategoryController::class);

/**
 * Blog Resource Controller
 */
Route::resource('blog', BlogController::class);
