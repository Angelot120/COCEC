
<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AgencyLocationController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqCommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\LocalityController;

use App\Http\Middleware\LogVisitor;
use Illuminate\Support\Facades\Route;

Route::middleware([LogVisitor::class])->group(function () {
    Route::get('/', [ViewsController::class, 'index'])->name('index');
});

Route::get('/admin', [ViewsController::class, 'login'])->name('login');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/admin/blogs', [ViewsController::class, 'blogs'])->name('admin.blogs');
Route::get('/show-agencies', [ViewsController::class, 'agency'])->name('agencies');
Route::get('/about', [ViewsController::class, 'about'])->name('about');
Route::get('/open-account', [ViewsController::class, 'account'])->name('main.account');
Route::get('/digital-finance', [ViewsController::class, 'finance'])->name('main.finance');
Route::get('/faq', [ViewsController::class, 'faq'])->name('main.faq');
Route::post('/faq/comment', [FaqCommentController::class, 'store'])->name('faq.comments.store');
Route::post('/blog/comment', [App\Http\Controllers\BlogCommentController::class, 'store'])->name('blog.comments.store');
Route::get('/create-account/physic', [AccountController::class, 'physic'])->name('account.create.physic');
Route::get('/create-account/morale', [AccountController::class, 'morale'])->name('account.create.morale');
Route::post('/create-account/physical/processing', [AccountController::class, 'storePhysical'])->name('account.store.physical');
Route::post('/create-account/moral/processing', [AccountController::class, 'storeMoral'])->name('account.store.moral');

Route::get('/career', [ViewsController::class, 'job'])->name('career');
Route::get('/career/details/{id}', [JobController::class, 'show'])->name('career.details');
Route::post('/career/apply', [JobController::class, 'store'])->name('career.apply');
Route::post('/career/apply/{id}', [JobController::class, 'applyOffer'])->name('career.apply.offer');
// Routes pour les produits
Route::prefix('products')->group(function () {
    Route::get('/', [ViewsController::class, 'products'])->name('product.index');
    Route::get('/details', [ViewsController::class, 'productDetails'])->name('product.details');
});

// Redirection de l'ancienne route vers la nouvelle
Route::get('/products-old', function() {
    return redirect()->route('product.index');
})->name('products');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ViewsController::class, 'contact'])->name('contact');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::prefix('admin/jobList')->controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('jobList.index');
    Route::delete('/destroy/{id}', 'destroy')->name('jobList.destroy');
    Route::get('/download/{id}/{type}', 'downloadFile')->name('jobList.download');
});

Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/dashboard', [ViewsController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/localities', [LocalityController::class, 'index'])->name('settings.localities');
    Route::post('/localities', [LocalityController::class, 'store'])->name('admin.locality.store');
    Route::delete('/localities/{id}', [LocalityController::class, 'destroy'])->name('admin.locality.delete');
    Route::put('/localities/{id}', [LocalityController::class, 'update'])->name('admin.locality.update');

    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/store', 'store')->name('blog.store');
        Route::patch('/edit/{id}', 'edit')->name('blog.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('blog.destroy');
    });

    Route::delete('/faq/comments/{id}', [FaqCommentController::class, 'destroy'])->name('faq.comments.destroy');
    Route::delete('/blog/comments/{id}', [App\Http\Controllers\BlogCommentController::class, 'destroy'])->name('blog.comments.destroy');

    Route::prefix('accounts/physical')->controller(AccountController::class)->group(function () {
        Route::get('/', 'indexPhysical')->name('accounts.physical.index');
        Route::get('/{id}', 'showPhysical')->name('accounts.physical.show');
        Route::put('/update/{id}', 'updatePhysical')->name('accounts.physical.update');
        Route::get('/pdf/{id}', 'generatePhysicalPdf')->name('accounts.physical.pdf');
    });

    Route::prefix('accounts/moral')->controller(AccountController::class)->group(function () {
        Route::get('/', 'indexMoral')->name('accounts.moral.index');
        Route::get('/{id}', 'showMoral')->name('accounts.moral.show');
        Route::put('/update/{id}', 'updateMoral')->name('accounts.moral.update');
        Route::get('/pdf/{id}', 'generateMoralPdf')->name('accounts.moral.pdf');
    });
});

Route::prefix('admin/career')->controller(JobOfferController::class)->group(function () {
    Route::get('/', 'index')->name('career.index');
    Route::get('/create', 'create')->name('career.create');
    Route::post('/store', 'store')->name('career.store');
    Route::get('/show/{id}', 'show')->name('career.show');
    Route::get('/edit/{id}', 'edit')->name('career.edit');
    Route::put('/update/{id}', 'update')->name('career.update');
    Route::delete('/destroy/{id}', 'destroy')->name('career.destroy');
});

Route::prefix('admin/jobOffer')->controller(JobOfferController::class)->group(function () {
    Route::get('/details/{id}', 'jobDetail')->name('jobOffer.details');
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
    Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('/profile/password', [AuthController::class, 'updatePassword'])->name('admin.profile.password');
});

Route::post('/login/processing', [AuthController::class, 'login'])->name('login.process');
