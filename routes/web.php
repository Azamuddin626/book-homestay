<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public routes
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/public-calendar', [BookingController::class, 'publicCalendar'])->name('calendar.public');
Route::get('/bookings/events', [BookingController::class, 'getEvents'])->name('bookings.events');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/calendar', [BookingController::class, 'publicCalendar'])->name('calendar.public');
    Route::get('/bookings/list', [BookingController::class, 'list'])->name('bookings.list');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/{id}/edit-page', [BookingController::class, 'editPage'])->name('bookings.editPage');
    Route::post('/bookings/{id}/update-dates', [BookingController::class, 'updateDates'])->name('bookings.updateDates');
});
