<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo / Mascot -->
<div class="shrink-0 flex items-center">
    <a href="{{ route('home') }}" class="flex items-center gap-2">
        <svg width="40" height="40" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <!-- worm body -->
            <path d="M15,70 Q10,50 25,45 Q15,35 30,28 Q22,15 40,15 Q55,12 60,25 Q75,22 75,38 Q88,42 80,55 Q90,65 75,70 Q78,85 60,82 Q50,92 38,80 Q22,85 20,72 Z"
                  fill="#7CB342" stroke="#2E2A24" stroke-width="3" stroke-linejoin="round"/>
            <!-- sunglasses -->
            <rect x="38" y="30" width="14" height="9" rx="3" fill="#2E2A24"/>
            <rect x="54" y="28" width="14" height="9" rx="3" fill="#2E2A24"/>
            <line x1="52" y1="33" x2="54" y2="32" stroke="#2E2A24" stroke-width="2"/>
            <!-- smile -->
            <path d="M42,45 Q50,52 58,44" fill="none" stroke="#2E2A24" stroke-width="2.5" stroke-linecap="round"/>
        </svg>
        <span class="font-doodle text-xl">blokstart</span>
    </a>
</div> This program is released for the 2017-18 season.

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                        {{ __('Projects') }}
                    </x-nav-link>
                </div>
            </div>

            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">
                        {{ __('Log in') }}
                    </a>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                {{ __('Projects') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-200 px-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">
                    {{ __('Log in') }}
                </a>
            </div>
        @endauth
    </div>
</nav>
