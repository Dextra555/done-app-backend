<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full bg-white">
    <div class="min-h-screen flex flex-col md:flex-row bg-white" x-data="{ sidebarOpen: false }">
        <!-- Mobile sidebar backdrop -->
        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false"
            class="fixed inset-0 z-20 bg-gray-900 bg-opacity-50 lg:hidden"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden bg-amber-50 lg:ml-64">
            <!-- Top navigation -->
            @include('admin.layouts.navigation')

            <!-- Main content -->
            <main class="flex-1 overflow-y-auto focus:outline-none bg-amber-50">
                <div class="py-6 px-4 sm:px-6 lg:px-8">
                    <!-- Mobile padding top to account for fixed header -->
                    <div class="lg:hidden mt-16"></div>
                    <!-- Page header -->
                    @if (isset($header))
                        <div class="mb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-bold text-amber-900">{{ $header }}</h1>
                                    <div class="w-16 h-1 bg-amber-500 rounded-full mt-2"></div>
                                </div>
                                @if (isset($actions))
                                    <div class="flex space-x-3">
                                        {{ $actions }}
                                    </div>
                                @endif
                            </div>
                            @if (isset($description))
                                <p class="mt-2 text-sm text-amber-700">{{ $description }}</p>
                            @endif
                        </div>
                    @endif

                    <!-- Page content -->
                    <div class="space-y-6">
                        @if (session('success'))
                            <div class="rounded-md bg-green-50 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="rounded-md bg-red-50 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800">
                                            There {{ $errors->count() === 1 ? 'is' : 'are' }} {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} with your submission
                                        </h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="bg-white rounded-lg shadow-sm border border-amber-100 overflow-hidden">
                            @yield('content')
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                @include('admin.layouts.footer')
            </main>
        </div>
    </div>
</body>
</html>
