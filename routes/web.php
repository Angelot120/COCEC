<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\LocalityController;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


/// ------------- Views ---------------

Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/admin', [ViewsController::class, 'login'])->name('login');



// Blog Details
Route::get('/admin/blogs', [ViewsController::class, 'blogs'])->name('admin.blogs');
Route::get('/admin/announcements', [ViewsController::class, 'announcements'])->name('admin.announcements');

// Route::get('/admin/blogs/create', [BlogController::class,'create'])->name('admin.blogs.create');


Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/announcements/{id}', [AnnouncementsController::class, 'show'])->name('announcements.show');


// Routes protégées par Sanctum
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    // Admin Routes
    Route::get('/dashboard', [ViewsController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/localities', [ViewsController::class, 'locality'])->name('admin.localities');

    Route::get('/admin/localities', [LocalityController::class, 'index'])->name('settings.localities');
Route::post('/admin/localities', [LocalityController::class, 'store'])->name('admin.locality.store');
Route::delete('/admin/localities/{id}', [LocalityController::class, 'destroy'])->name('admin.locality.delete');
Route::put('/admin/localities/{id}', [LocalityController::class, 'update'])->name('admin.locality.update');


    // Blog routes
    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/store', 'store')->name('blog.store');

        Route::patch('/edit/{id}', 'edit')->name('blog.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('blog.destroy');
    });

    Route::prefix('announcements')->controller(BlogController::class)->group(function () {
        Route::post('/create', 'create')->name('announcements.create');
        Route::patch('/edit/{id}', 'edit')->name('announcements.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('announcements.destroy');
    });
    

});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/// Processing Routes 

Route::post('/login/processing', [AuthController::class, 'login'])->name('login.process');
