@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-nature-stone p-6 rounded-lg shadow-sm border border-nature-clay">
        <h2 class="text-2xl font-bold text-nature-bark mb-6">Login</h2>

        @if ($errors->any())
            <div class="bg-red-50 text-red-800 p-4 mb-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-nature-bark mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg" required autofocus>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-nature-bark mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="flex items-center">
                <input id="show-password" type="checkbox" class="mr-2" onclick="togglePasswordVisibility()">
                <label for="show-password" class="text-sm">Show Password</label>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-nature-fern hover:bg-nature-moss text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Login
                </button>
                <a href="{{ route('register') }}" class="text-nature-fern hover:text-nature-moss transition duration-300">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', passwordFieldType);
    }
    </script>
@endsection
