<?php

use Illuminate\Support\Facades\Route;
use App\Models\job;


Route::get('/home', function () {
    return view('HomePage/home');
});

// Route::get('/', function () {
//     $jobs = Job::all();
// });


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contactUs');
});
