<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController as FrontHome;
use App\Http\Controllers\Frontend\AboutController as FrontAbout;
use App\Http\Controllers\Frontend\ContactController as FrontContact;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Admin\PracticeController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppointmentController;

Route::get('/', [FrontHome::class, 'index'])->name('home');
Route::get('/a-propos', [FrontAbout::class, 'index'])->name('about');
Route::get('/domaines', [FrontHome::class, 'practices'])->name('practices.index');
Route::get('/domaines/{practice:slug?}/{id?}', [FrontHome::class, 'practiceShow'])->name('practices.show'); // adapter selon besoin
Route::get('/equipe', [FrontHome::class, 'team'])->name('team');
Route::get('/contact', [FrontContact::class, 'index'])->name('contact');
Route::post('/contact', [FrontContact::class, 'submit'])->name('contact.submit');
Route::post('/rendez-vous', [FrontContact::class, 'appointment'])->name('appointment.submit');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Admin
Route::middleware(['auth','role:editor,admin,super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('lawyers', LawyerController::class);
    Route::resource('practices', PracticeController::class)->except(['show']);
    Route::get('practices/order', [PracticeController::class, 'order'])->name('practices.order');
    Route::post('practices/order', [PracticeController::class, 'saveOrder'])->name('practices.saveOrder');

    Route::resource('contacts', AdminContactController::class)->only(['index','show','destroy','update']);
    Route::resource('appointments', AppointmentController::class)->only(['index','show','update','destroy']);

    Route::middleware('role:admin,super_admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::view('pages/manage', 'admin.pages.index')->name('pages.manage');
        Route::view('settings', 'admin.settings.index')->name('settings.index');
    });
});