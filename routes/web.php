<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;

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

/**
 * Front End Controller
 */

Route::get('/', [FrontController::class, 'index'])->name('home.index');
Route::get('/blog/all', [FrontController::class, 'blog'])->name('home.blog');
Route::get('/shop', [FrontController::class, 'shop'])->name('home.shop');

/**
 * Single Action Controller 
 */

Route::get('/about', AboutController::class)->name('home.about');


Auth::routes([
    'verify' => true,
]);

/**
 * Route Middleware
 */
Route::middleware(['auth', 'verified'])->group(
    function () {

        /**
         * Admin Dashboard Controller
         */
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        /**
         * Role Resource Controller
         */
        Route::resource('role', RoleController::class)->middleware('RoleUserAccess');
        Route::group(['prefix' => 'role'], function () {
            Route::get('/trashed/{action}', [RoleController::class, 'trashed'])->name('role.trashed');
            Route::get('/restore/{role}', [RoleController::class, 'restore'])->withTrashed()->name('role.restore');
            Route::delete('/forceDelete/{role}', [RoleController::class, 'forceDelete'])->withTrashed()->name('role.forceDelete');
        })->middleware('RoleUserAccess');

        /**
         * User Resource Controller
         */
        Route::resource('user', UserController::class)->middleware('RoleUserAccess');
        Route::group(['prefix' => 'user'], function () {
            Route::get('/trashed/{action}', [UserController::class, 'trashed'])->name('user.trashed');
            Route::get('/restore/{user}', [UserController::class, 'restore'])->withTrashed()->name('user.restore');
            Route::delete('/forceDelete/{user}', [UserController::class, 'forceDelete'])->withTrashed()->name('user.forceDelete');
        })->middleware('RoleUserAccess');

        /**
         * Category Resource Controller
         */
        Route::resource('category', CategoryController::class)->middleware('CategoryAccess');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/trashed/{action}', [CategoryController::class, 'trashed'])->name('category.trashed');
            Route::get('/restore/{category}', [CategoryController::class, 'restore'])->withTrashed()->name('category.restore');
            Route::delete('/forceDelete/{category}', [CategoryController::class, 'forceDelete'])->withTrashed()->name('category.forceDelete');
        })->middleware('CategoryAccess');

        /**
         * Subcategory Resource Controller
         */
        Route::resource('subcategory', SubcategoryController::class);
        Route::group(['prefix' => 'subcategory'], function () {
            Route::get('/trashed/{action}', [SubcategoryController::class, 'trashed'])->name('subcategory.trashed');
            Route::get('/restore/{subcategory}', [SubcategoryController::class, 'restore'])->withTrashed()->name('subcategory.restore');
            Route::delete('/forceDelete/{subcategory}', [SubcategoryController::class, 'forceDelete'])->withTrashed()->name('subcategory.forceDelete');
        });


        /**
         * Blog Resource Controller
         */
        Route::resource('blog', BlogController::class)->middleware('BlogAccess');
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/trashed/{action}', [BlogController::class, 'trashed'])->name('blog.trashed');
            Route::get('/restore/{blog}', [BlogController::class, 'restore'])->withTrashed()->name('blog.restore');
            Route::delete('/forceDelete/{blog}', [BlogController::class, 'forceDelete'])->withTrashed()->name('blog.forceDelete');
            Route::get('/status/{blog}', [BlogController::class, 'status'])->name('blog.status');
        })->middleware('BlogAccess');

        /**
         * Product Resource Controller
         */
        Route::resource('product', ProductController::class);
        Route::group(['prefix' => 'product'], function () {
            Route::get('/trashed/{action}', [ProductController::class, 'trashed'])->name('product.trashed');
            Route::get('/restore/{product}', [ProductController::class, 'restore'])->withTrashed()->name('product.restore');
            Route::delete('/forceDelete/{product}', [ProductController::class, 'forceDelete'])->withTrashed()->name('product.forceDelete');
            Route::get('/status/{product}', [ProductController::class, 'status'])->name('product.status');
        });
    }
);



Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
