<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;


/// ------------- Views ---------------

Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/admin', [ViewsController::class, 'login'])->name('login');



// Blog Details
Route::get('/admin/blogs', [ViewsController::class, 'blogs'])->name('admin.blogs');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/announcements/{id}', [AnnouncementsController::class, 'show'])->name('announcements.show');


// Routes protégées par Sanctum
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    Route::get('/dashboard', [ViewsController::class, 'dashboard'])->name('admin.dashboard');

    // Blog routes
    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::post('/create', 'create')->name('blog.create');
        Route::patch('/edit/{id}', 'edit')->name('blog.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('blog.destroy');
    });

    Route::prefix('announcements')->controller(BlogController::class)->group(function () {
        Route::post('/create', 'create')->name('announcements.create');
        Route::patch('/edit/{id}', 'edit')->name('announcements.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('announcements.destroy');
    });

    Route::get('/logout', [ViewsController::class, 'logout'])->name('logout');
});


/// Processing Routes 

Route::post('/login/processing', [AuthController::class, 'login'])->name('login.process');
