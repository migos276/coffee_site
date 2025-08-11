<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home', [
        'practices' => \App\Models\Practice::all(),
        'lawyers' => \App\Models\Lawyer::all()
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public routes for practices
Route::get('/practices', function () {
    return view('page.practices', [
        'practices' => \App\Models\Practice::all()
    ]);
})->name('practices.index');

Route::get('/practices/{practice}', function (\App\Models\Practice $practice) {
    return view('page.practice-detail', [
        'practice' => $practice
    ]);
})->name('practices.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// About page
Route::get('/about', function () {
    return view('page.about');
})->name('about');

// Team page
Route::get('/team', function () {
    return view('page.team', [
        'lawyers' => \App\Models\Lawyer::all()
    ]);
})->name('team');

require __DIR__.'/auth.php';
