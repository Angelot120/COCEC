<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ViewsController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;


/// ------------- Views ---------------

Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/admin', [ViewsController::class, 'login'])->name('login');



// --------------- Blog Details -----------------
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/admin/blogs', [ViewsController::class, 'blogs'])->name('admin.blogs');
Route::get('/admin/announcements', [ViewsController::class, 'announcements'])->name('admin.announcements');
Route::get('/show-agencies', [ViewsController::class, 'agency'])->name('agencies');
Route::get('/about', [ViewsController::class, 'about'])->name('about');
Route::get('/open-account', [ViewsController::class, 'account'])->name('main.account');
Route::get('/digital-finance', [ViewsController::class, 'finance'])->name('main.finance');
Route::get('/faq', [ViewsController::class, 'faq'])->name('main.faq');
Route::get('/create-account', [AccountController::class, 'index'])->name('account.create');
Route::post('/create-account/physical/processing', [AccountController::class, 'storePhysical'])->name('account.store.physical');
Route::post('/create-account/moral/processing', [AccountController::class, 'storeMoral'])->name('account.store.moral');

Route::get('/career', [ViewsController::class, 'job'])->name('career');
Route::post('/career/apply', [JobController::class, 'store'])->name('career.apply');
Route::get('/products', [ViewsController::class, 'products'])->name('products');
Route::get('/contact', [ViewsController::class, 'contact'])->name('contact');

// Route::get('/admin/blogs/create', [BlogController::class,'create'])->name('admin.blogs.create');


Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/announcements/{id}', [AnnouncementsController::class, 'show'])->name('announcements.show');


// ------------------ Routes protégées par Sanctum --------------
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    // ---------- Admin Routes ---------
    Route::get('/dashboard', [ViewsController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/localities', [ViewsController::class, 'locality'])->name('admin.localities');

    // -------- Blog routes --------------
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
