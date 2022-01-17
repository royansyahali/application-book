<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route("login");
});
Auth::routes(['verify' => false,'register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/book/index', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');

    Route::middleware(['admin'])->group(function () {
        Route::get('/users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
        Route::get('/users', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
        Route::put('/users/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
        Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
        Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');


        Route::get('/author/index', [App\Http\Controllers\AuthorController::class, 'index'])->name('author.index');
        Route::get('/author', [App\Http\Controllers\AuthorController::class, 'create'])->name('author.create');
        Route::post('/author', [App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');
        Route::put('/author/update/{id}', [App\Http\Controllers\AuthorController::class, 'update'])->name('author.update');
        Route::get('/author/edit/{id}', [App\Http\Controllers\AuthorController::class, 'edit'])->name('author.edit');
        Route::delete('/author/delete/{id}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('author.delete');


        Route::get('/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
        Route::get('/category', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
        Route::put('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
        Route::delete('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');


        Route::get('/book', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
        Route::post('/book', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');
        Route::put('/book/update/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');
        Route::get('/book/edit/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
        Route::delete('/book/delete/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.delete');

    });

});
// Route::del('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');


