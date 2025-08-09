<nav class="sticky top-0 z-10 bg-white border-b border-amber-100 shadow-sm">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button 
                    @click="sidebarOpen = !sidebarOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-amber-700 hover:text-amber-900 hover:bg-amber-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg 
                        class="block h-6 w-6" 
                        :class="{'hidden': sidebarOpen, 'block': !sidebarOpen }" 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg 
                        class="hidden h-6 w-6" 
                        :class="{'block': sidebarOpen, 'hidden': !sidebarOpen }" 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Right side items -->
            <div class="flex items-center">
                <!-- Search bar -->
                <div class="hidden md:block ml-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            placeholder="Search..." 
                            class="block w-full pl-10 pr-3 py-2 border border-amber-200 rounded-md leading-5 bg-amber-50 placeholder-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 sm:text-sm"
                        >
                    </div>
                </div>

                <!-- Notifications -->
                <div class="ml-4 flex items-center md:ml-6">
                    <button class="p-1 rounded-full text-amber-600 hover:text-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button 
                                @click="open = !open" 
                                class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" 
                                id="user-menu" 
                                aria-expanded="false" 
                                aria-haspopup="true"
                            >
                                <span class="sr-only">Open user menu</span>
                                <div class="h-8 w-8 rounded-full bg-amber-600 flex items-center justify-center text-white font-bold">
                                    {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                                </div>
                            </button>
                        </div>
                        
                        <div 
                            x-show="open" 
                            @click.away="open = false" 
                            x-transition:enter="transition ease-out duration-100" 
                            x-transition:enter-start="transform opacity-0 scale-95" 
                            x-transition:enter-end="transform opacity-100 scale-100" 
                            x-transition:leave="transition ease-in duration-75" 
                            x-transition:leave-start="transform opacity-100 scale-100" 
                            x-transition:leave-end="transform opacity-0 scale-95" 
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" 
                            role="menu" 
                            aria-orientation="vertical" 
                            aria-labelledby="user-menu"
                            style="display: none;"
                        >
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50" role="menuitem">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50" role="menuitem">Settings</a>
                            <form method="POST" action="{{ route('admin.logout') }}" class="block w-full text-left">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-amber-50" role="menuitem">
                                    {{ __('Sign out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
