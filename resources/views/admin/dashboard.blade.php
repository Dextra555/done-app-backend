@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Admin Dashboard</h2>
                <p class="mt-2 text-gray-600">Welcome to your admin dashboard!</p>
                
                <div class="mt-8">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <x-button type="submit" class="bg-red-600 hover:bg-red-700">
                            {{ __('Log Out') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
