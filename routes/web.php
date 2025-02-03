<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index'])->name('home');

// Endpoint for FullCalendar events
Route::get('/bookings/events', [BookingController::class, 'getEvents'])->name('bookings.events');

// Store a new booking
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

// Return JSON for a specific booking (for editing)
Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');

// Update a booking (using POST; you may use PUT/PATCH with method spoofing if preferred)
Route::post('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');

// Delete a booking
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

// List all bookings (View all customer)
Route::get('/bookings/all', [BookingController::class, 'list'])->name('bookings.list');

// Edit page for a booking (from the list view)
Route::get('/bookings/{id}/edit-page', [BookingController::class, 'editPage'])->name('bookings.editPage');
