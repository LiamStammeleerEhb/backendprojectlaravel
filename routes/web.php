<?php

use App\Models\NewsArticle;
use App\Models\FAQCategory;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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


Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

require __DIR__.'/auth.php';
