@extends('layouts.layout')

@section('title', 'Login - Pulai Greens Homestay')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-nature-sand dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <!-- Logo and Header -->
        <div class="p-6 bg-nature-stone dark:bg-gray-700 flex flex-col items-center">
            <a href="/" class="flex items-center mb-4">
                <img src="{{ asset('assets/images/LOGO PGH.png') }}" class="h-16 w-auto"
                    alt="Pulai Greens Homestay Logo">
            </a>
            <h2 class="text-2xl font-bold text-nature-bark dark:text-white">Log Masuk untuk Admin Sahaja</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Sila log masuk untuk mengakses sistem penempahan
            </p>
        </div>

        <!-- Form Section -->
        <div class="p-8">
            <!-- Session Status -->
            @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-lg">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Emel</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-nature-fern focus:border-nature-fern block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata
                        Laluan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-nature-fern focus:border-nature-fern block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 text-nature-fern bg-gray-100 border-gray-300 rounded focus:ring-nature-moss dark:focus:ring-nature-fern dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="remember_me" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat
                        saya</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm font-medium text-nature-bark hover:text-nature-fern dark:text-primary-500 dark:hover:text-primary-400">
                        Lupa kata laluan?
                    </a>
                    @endif

                    <button type="submit"
                        class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:text-white dark:hover:bg-primary-700 focus:outline-none transition hover:scale-[1.02] duration-300">
                        Log Masuk
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <a href="/"
                    class="text-sm font-medium text-nature-bark hover:text-nature-fern dark:text-primary-500 dark:hover:text-primary-400">
                    &larr; Kembali ke laman utama
                </a>
            </div>
        </div>
    </div>
</div>
@endsection