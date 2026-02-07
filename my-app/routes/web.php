<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [SearchController::class, 'searchIndex'])->name('home');
Route::get('/reservation/{id}', [ReservationController::class, 'showPaymentForm'])->name('reservation.form')->middleware('auth');
Route::post('/reservation', [ReservationController::class, 'processPayment'])->name('reservation.process')->middleware('auth');
Route::get('/ticket/{id}/download', [ReservationController::class, 'downloadTicket'])->name('ticket.download')->middleware('auth');
Route::get('/reservation/success/{id}', [ReservationController::class, 'success'])->name('reservation.success');
require __DIR__.'/auth.php';
