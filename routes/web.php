<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/public-calendar', [BookingController::class, 'publicCalendar'])->name('calendar.public');
Route::get('/bookings/events', [BookingController::class, 'getEvents'])->name('bookings.events');

// Authentication routes provided by Laravel Breeze
require __DIR__ . '/auth.php';

// Login and Register routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// PUBLIC CALENDAR
Route::get('/calendar', [BookingController::class, 'publicCalendar'])->name('calendar.public');
Route::get('/bookings/create', [BookingController::class, 'publicCreate'])->name('bookings.public.create');
Route::post('/bookings/public/store', [BookingController::class, 'publicStore'])->name('bookings.public.store');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [BookingController::class, 'index'])->name('index');
    Route::get('/bookings/list', [BookingController::class, 'list'])->name('bookings.list');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/{id}/edit-page', [BookingController::class, 'editPage'])->name('bookings.editPage');
    Route::post('/bookings/{id}/update-dates', [BookingController::class, 'updateDates'])->name('bookings.updateDates');
});

// Leads management routes
Route::get('/leads', [App\Http\Controllers\LeadController::class, 'index'])->name('leads.index')->middleware('auth');
Route::put('/leads/{lead}/update-status', [App\Http\Controllers\LeadController::class, 'updateStatus'])->name('leads.update-status')->middleware('auth');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
