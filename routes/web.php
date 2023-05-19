<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

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

/**
 * Route Middleware
 */
Route::middleware(['auth'])->group(
    function () {

        /**
         * Admin Dashboard Controller
         */
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        /**
         * Role Resource Controller
         */
        Route::resource('role', RoleController::class);
        Route::group(['prefix' => 'role'], function () {
            Route::get('/trashed/{action}', [RoleController::class, 'trashed'])->name('role.trashed');
            Route::get('/restore/{role}', [RoleController::class, 'restore'])->withTrashed()->name('role.restore');
            Route::delete('/forceDelete/{role}', [RoleController::class, 'forceDelete'])->withTrashed()->name('role.forceDelete');
        });

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
    }
);
