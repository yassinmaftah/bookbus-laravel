<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'searchIndex'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ReservationController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservation/{id}', [ReservationController::class, 'showPaymentForm'])->name('reservation.form');
    Route::post('/reservation', [ReservationController::class, 'processPayment'])->name('reservation.process');
    Route::get('/reservation/success/{id}', [ReservationController::class, 'success'])->name('reservation.success');
    Route::delete('/reservation/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');
    Route::get('/ticket/{id}/download', [ReservationController::class, 'downloadTicket'])->name('ticket.download');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::get('/buses', [AdminController::class, 'buses'])->name('buses');
    Route::get('/routes', [AdminController::class, 'routes'])->name('routes');
});

require __DIR__.'/auth.php';
