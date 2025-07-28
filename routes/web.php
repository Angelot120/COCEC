<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AgencyLocationController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqCommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\LocalityController;

use App\Http\Middleware\LogVisitor;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::middleware([LogVisitor::class])->group(function () {

    /// ------------- Views ---------------
    Route::get('/', [ViewsController::class, 'index'])->name('index');
});

Route::get('/admin', [ViewsController::class, 'login'])->name('login');

// --------------- Blog Details -----------------
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/admin/blogs', [ViewsController::class, 'blogs'])->name('admin.blogs');
// Route::get('/admin/announcements', [ViewsController::class, 'announcements'])->name('admin.announcements');
Route::get('/show-agencies', [ViewsController::class, 'agency'])->name('agencies');
Route::get('/about', [ViewsController::class, 'about'])->name('about');
Route::get('/open-account', [ViewsController::class, 'account'])->name('main.account');
Route::get('/digital-finance', [ViewsController::class, 'finance'])->name('main.finance');
Route::get('/faq', [ViewsController::class, 'faq'])->name('main.faq');
Route::post('/faq/comment', [FaqCommentController::class, 'store'])->name('faq.comments.store');
Route::get('/create-account', [AccountController::class, 'index'])->name('account.create');
Route::post('/create-account/physical/processing', [AccountController::class, 'storePhysical'])->name('account.store.physical');
Route::post('/create-account/moral/processing', [AccountController::class, 'storeMoral'])->name('account.store.moral');

Route::get('/career', [ViewsController::class, 'job'])->name('career');
Route::get('/career/details/{id}', [JobController::class, 'show'])->name('career.details');
Route::post('/career/apply', [JobController::class, 'store'])->name('career.apply');
Route::post('/career/apply/{id}', [JobController::class, 'applyOffer'])->name('career.apply.offer');
Route::get('/products', [ViewsController::class, 'products'])->name('products');
Route::get('/contact', [ViewsController::class, 'contact'])->name('contact');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Route::get('/admin/blogs/create', [BlogController::class,'create'])->name('admin.blogs.create');


Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// Route::get('/announcements/{id}', [AnnouncementsController::class, 'show'])->name('announcements.show');


// ------------------ Routes protégées par Sanctum --------------
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    // ---------- Admin Routes ---------
    Route::get('/dashboard', [ViewsController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/localities', [ViewsController::class, 'locality'])->name('admin.localities');

    Route::get('/admin/localities', [LocalityController::class, 'index'])->name('settings.localities');
    Route::post('/admin/localities', [LocalityController::class, 'store'])->name('admin.locality.store');
    Route::delete('/admin/localities/{id}', [LocalityController::class, 'destroy'])->name('admin.locality.delete');
    Route::put('/admin/localities/{id}', [LocalityController::class, 'update'])->name('admin.locality.update');


    // -------- Blog routes --------------
    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/store', 'store')->name('blog.store');

        Route::patch('/edit/{id}', 'edit')->name('blog.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('blog.destroy');
    });

    // -------- Faq routes --------------

    Route::delete('/faq/comments/{id}', [FaqCommentController::class, 'destroy'])->name('faq.comments.destroy');
});

// -------- Job Offers routes --------------
Route::prefix('admin/career')->controller(JobOfferController::class)->group(function () {
    Route::get('/', 'index')->name('career.index');
    Route::get('/create', 'create')->name('career.create');
    Route::post('/store', 'store')->name('career.store');
    Route::get('/show/{id}', 'show')->name('career.show');
    Route::get('/edit/{id}', 'edit')->name('career.edit');
    Route::put('/update/{id}', 'update')->name('career.update');
    Route::delete('/destroy/{id}', 'destroy')->name('career.destroy');
    // Route::patch('/toggle-status/{id}', 'toggleStatus')->name('job_offers.toggle-status');
});

Route::prefix('admin/agency')->controller(AgencyLocationController::class)->group(function () {
    Route::get('/', 'index')->name('agency.index');
    Route::get('/create', 'create')->name('agency.create');
    Route::post('/store', 'store')->name('agency.store');
    Route::put('/update/{id}', 'update')->name('agency.update');
    Route::delete('/destroy/{id}', 'destroy')->name('agency.destroy');
});

Route::prefix('admin/announcement')->controller(AnnouncementsController::class)->group(function () {
    Route::get('/', 'index')->name('announcement.index');
    Route::get('/create', 'create')->name('announcement.create');
    Route::post('/store', 'store')->name('announcement.store');
    Route::put('/update/{id}', 'update')->name('announcement.update');
    Route::delete('/destroy/{id}', 'destroy')->name('announcement.destroy');
});




Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/// Processing Routes 

Route::post('/login/processing', [AuthController::class, 'login'])->name('login.process');
