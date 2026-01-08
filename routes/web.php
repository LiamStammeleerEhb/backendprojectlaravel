<?php

use App\Models\NewsArticle;
use App\Models\FAQCategory;

use App\Http\Controllers\UserLookupController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/news', function () {
    $articles = NewsArticle::whereDate('publication_date', '<=', now())->orderByDesc('publication_date')->get();

    return view('news.index', compact('articles'));
})->name('news');

Route::get('/news/{article}', function (NewsArticle $article) {
    return view('news.show', compact('article'));
});

Route::get('/faq', function () {
    $categories = FAQCategory::with('faqs')->get();

    return view('faq.index', compact('categories'));
})->name('faq');

Route::middleware('auth')->group(function () {
    Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('users.unfollow');
});

Route::middleware('auth')->get('/following', [FollowController::class, 'index'])
    ->name('users.following');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);


Route::get('/users/search', [UserLookupController::class, 'index'])->name('users.search');
Route::get('/users/{user}', [UserLookupController::class, 'show'])->name('users.show');

require __DIR__.'/auth.php';
