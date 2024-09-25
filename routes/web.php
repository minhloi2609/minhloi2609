<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('')->middleware('user')->group(function () {
    Route::get('/comments', [CommentController::class, 'loadMoreComments']);
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/loai-tin/{id}', [HomeController::class, 'showByCategory'])->name('loai-tin.showByCategory');
    Route::get('/tin-tuc/{id}', [HomeController::class, 'detail'])->name('tin-tuc.detail');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
});


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin.home');

    // Routes for Danhmuc
    Route::prefix('danhmuc')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('admin.danhmuc.index');
        Route::post('/add', [DanhMucController::class, 'store'])->name('admin.danhmuc.store');
        Route::delete('{id}', [DanhMucController::class, 'delete'])->name('admin.danhmuc.delete');
        Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('admin.danhmuc.edit');
        Route::put('{id}', [DanhMucController::class, 'update'])->name('admin.danhmuc.update');
        // Add more routes for Danhmuc as needed
    });

    // Routes for Tintuc
    Route::prefix('tintuc')->group(function () {
        Route::get('/', [TinController::class, 'index'])->name('admin.tintuc.index');
        Route::post('/add', [TinController::class, 'store'])->name('admin.tintuc.store');
        Route::get('{id}/edit', [TinController::class, 'edit'])->name('admin.tintuc.edit');
        Route::put('{id}', [TinController::class, 'update'])->name('admin.tintuc.update');
        Route::delete('{id}', [TinController::class, 'delete'])->name('admin.tintuc.delete');
        // Add more routes for Tintuc as needed
    });
    // Routes for users
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/change-status', [UserController::class, 'changeStatus'])->name('admin.user.changeStatus');
        // Add more routes for Tintuc as needed
    });
    // Routes for Binh luan
    Route::prefix('binhluan')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
        Route::post('/change-comment', [CommentController::class, 'changeComment'])->name('admin.comment.changeComment');
        // Add more routes for Tintuc as needed
    });
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
