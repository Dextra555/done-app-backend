<!-- Sidebar -->
<aside 
    class="fixed inset-y-0 left-0 z-30 w-64 transform bg-amber-800 text-white transition-transform duration-300 ease-in-out lg:translate-x-0"
    :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
    x-cloak
>
    <div class="flex h-full flex-col">
        <!-- Logo -->
        <div class="flex h-16 items-center justify-center border-b border-amber-700 bg-amber-900 px-4">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                {{ config('app.name') }} Admin
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 overflow-y-auto py-4 px-3">
            <x-admin.nav-item :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </x-admin.nav-item>

            <!-- Products Management -->
            <div class="space-y-1">
                <div class="px-3 py-2 text-xs font-semibold text-amber-300 uppercase tracking-wider">
                    Product Management
                </div>
                
                <x-admin.nav-item :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="ml-3">Products</span>
                </x-admin.nav-item>

                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span class="ml-3">Categories</span>
                </x-admin.nav-item>

                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span class="ml-3">Tags</span>
                </x-admin.nav-item>
            </div>

            <!-- User Management -->
            <div class="space-y-1">
                <div class="px-3 py-2 text-xs font-semibold text-amber-300 uppercase tracking-wider">
                    User Management
                </div>
                
                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="ml-3">B2C Users</span>
                </x-admin.nav-item>

                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-3">B2B Users</span>
                </x-admin.nav-item>
            </div>

            <!-- Sales & Orders -->
            <div class="space-y-1">
                <div class="px-3 py-2 text-xs font-semibold text-amber-300 uppercase tracking-wider">
                    Sales & Orders
                </div>
                
                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span class="ml-3">Orders</span>
                </x-admin.nav-item>

                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="ml-3">Carts</span>
                </x-admin.nav-item>
            </div>

            <!-- Analytics & Reports -->
            <div class="space-y-1">
                <div class="px-3 py-2 text-xs font-semibold text-amber-300 uppercase tracking-wider">
                    Analytics
                </div>
                
                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span class="ml-3">Reports</span>
                </x-admin.nav-item>

                <x-admin.nav-item href="#" :active="false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ml-3">Analytics</span>
                </x-admin.nav-item>
            </div>
        </nav>

        <!-- User profile -->
        <div class="border-t border-amber-700 p-4">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-amber-600 flex items-center justify-center text-white font-bold">
                    {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::guard('admin')->user()->name }}</p>
                    <p class="text-xs font-medium text-amber-200">Administrator</p>
                </div>
                <div class="ml-auto">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-amber-300 hover:text-white">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>
