@extends('layouts.layout')

@section('title', 'Welcome to DashboardStay')

@section('content')

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 gap-8">
            <!-- Three big buttons -->
            <button
                class="bg-[#e6efe6] hover:bg-[#d1e0d1] text-[#4a5d4a] font-bold py-6 px-12 rounded-lg shadow-md transform transition duration-200 hover:scale-105 w-64 text-lg">
                Book Now
            </button>
            <button
                class="bg-[#f0ebe0] hover:bg-[#e6dfd0] text-[#5d574a] font-bold py-6 px-12 rounded-lg shadow-md transform transition duration-200 hover:scale-105 w-64 text-lg">
                View Rooms
            </button>
            <button
                class="bg-[#e6efe6] hover:bg-[#d1e0d1] text-[#4a5d4a] font-bold py-6 px-12 rounded-lg shadow-md transform transition duration-200 hover:scale-105 w-64 text-lg">
                Special Offers
            </button>
        </div>
    </div>
@endsection