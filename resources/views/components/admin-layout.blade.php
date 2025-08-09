@props([
    'header' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles -->
    <style>
        :root {
            --primary-50: #fdf8f6;
            --primary-100: #f2e8e5;
            --primary-200: #eaddd7;
            --primary-300: #d4b5a5;
            --primary-400: #c58a6e;
            --primary-500: #b5653d;
            --primary-600: #9e4e2e;
            --primary-700: #7f3c25;
            --primary-800: #682c1d;
            --primary-900: #4f2419;
        }
        
        .bg-primary-50 { background-color: var(--primary-50); }
        .bg-primary-100 { background-color: var(--primary-100); }
        .bg-primary-200 { background-color: var(--primary-200); }
        .bg-primary-300 { background-color: var(--primary-300); }
        .bg-primary-400 { background-color: var(--primary-400); }
        .bg-primary-500 { background-color: var(--primary-500); }
        .bg-primary-600 { background-color: var(--primary-600); }
        .bg-primary-700 { background-color: var(--primary-700); }
        .bg-primary-800 { background-color: var(--primary-800); }
        .bg-primary-900 { background-color: var(--primary-900); }
        
        .text-primary-50 { color: var(--primary-50); }
        .text-primary-100 { color: var(--primary-100); }
        .text-primary-200 { color: var(--primary-200); }
        .text-primary-300 { color: var(--primary-300); }
        .text-primary-400 { color: var(--primary-400); }
        .text-primary-500 { color: var(--primary-500); }
        .text-primary-600 { color: var(--primary-600); }
        .text-primary-700 { color: var(--primary-700); }
        .text-primary-800 { color: var(--primary-800); }
        .text-primary-900 { color: var(--primary-900); }
        
        .border-primary-50 { border-color: var(--primary-50); }
        .border-primary-100 { border-color: var(--primary-100); }
        .border-primary-200 { border-color: var(--primary-200); }
        .border-primary-300 { border-color: var(--primary-300); }
        .border-primary-400 { border-color: var(--primary-400); }
        .border-primary-500 { border-color: var(--primary-500); }
        .border-primary-600 { border-color: var(--primary-600); }
        .border-primary-700 { border-color: var(--primary-700); }
        .border-primary-800 { border-color: var(--primary-800); }
        .border-primary-900 { border-color: var(--primary-900); }
        
        .hover\:bg-primary-600:hover { background-color: var(--primary-600); }
        .hover\:text-primary-600:hover { color: var(--primary-600); }
        
        .focus\:ring-primary-500:focus { --tw-ring-color: var(--primary-500); }
        .focus\:border-primary-500:focus { border-color: var(--primary-500); }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('admin.layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
