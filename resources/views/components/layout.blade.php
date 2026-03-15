@props(['title' => 'Quartfolio | Graphic Design & Web Development by Jerry Janquart'])

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="font-inter antialiased text-gray-900 bg-gray-900 tracking-tight">
    
    <!-- Page wrapper -->
    <div class="min-h-screen max-w-7xl mx-auto">

    <!-- Site header -->
    <header class="absolute w-full z-30 max-w-7xl mx-auto">

        <div class="max-w-6xl mx-auto flex items-center justify-between h-20">
        
        <!-- Site branding -->    
        <div class="ml-4 shrink-0 bg-black hover:bg-gray-500 btn-sm rounded-none mr-10 md:hidden">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-folder-open text-white"></i>
            </a>
        </div>
                

                <!-- Desktop navigation -->
                <nav class="hidden md:flex md:grow">

                    <!-- Site branding -->
                    <div class="ml-4 shrink-0 bg-black hover:bg-gray-500 btn-sm rounded-none mr-10 hidden md:block">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-folder-open text-white"></i>
                        </a>
                    </div>

                    <!-- Desktop menu links -->
                    <ul class="flex grow flex-wrap items-center font-medium">
                        
                        

                        <li x-data="{ open: false }" class="relative">
                                
                            <!-- Trigger -->
                            <button 
                                @click="open = !open"
                                @click.away="open = false"
                                class="text-black hover:text-gray-600 md:px-5 py-2 flex items-center transition duration-150 ease-in-out"
                            >
                                    <span class="lg:hidden">/ Design</span>
                                    <span class="hidden lg:inline">/ Graphic Design</span>
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div 
                                x-show="open"
                                x-transition
                                class="absolute right-0 mt-2 w-48 bg-white shadow-lg border border-gray-200"
                            >
                                <a class="block px-5 py-2 hover:bg-gray-100"
                                href="{{ route('covers.index') }}">
                                    -> Covers
                                </a>

                                <a class="block px-5 py-2 hover:bg-gray-100"
                                href="{{ route('layouts.index') }}">
                                    -> Layouts
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ url('/#development') }}">
                                <span class="lg:hidden">/ Development</span>
                                <span class="hidden lg:inline">/ Web Development</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ url('/#blasts') }}">
                                <span class="lg:hidden">/ Marketing</span>
                                <span class="hidden lg:inline">/ Email Marketing</span>
                            </a>
                        </li>

                        @if (session('admin_logged_in'))
    
                            <li x-data="{ open: false }" class="relative">
                                
                                <!-- Trigger -->
                                <button 
                                    @click="open = !open"
                                    @click.away="open = false"
                                    class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out"
                                >
                                    / Admin
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Dropdown -->
                                <div 
                                    x-show="open"
                                    x-transition
                                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg border border-gray-200"
                                >
                                    <a class="block px-5 py-2 hover:bg-gray-100"
                                    href="{{ route('admin.projects.index') }}">
                                        -> Projects
                                    </a>

                                    <a class="block px-5 py-2 hover:bg-gray-100"
                                    href="{{ route('messages.index') }}">
                                        -> Messages
                                    </a>

                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="block w-full text-left px-5 py-2 hover:bg-gray-100"
                                        >
                                            X Logout
                                        </button>
                                    </form>
                                </div>
                            </li>

                        @endif
                        

                    </ul>

                    <ul class="flex justify-end flex-wrap items-center pr-2 mr-4">
                        <li>
                            <a class="font-bold btn-sm text-white bg-black hover:bg-gray-500 ml-6 rounded-none" href="{{ route('message.send') }}">Contact</a>
                        </li>
                    </ul>

                </nav>
                
                <!-- Mobile menu -->
                <div class="inline-flex md:hidden ml-auto" x-data="{ expanded: false }">

                    <!-- Hamburger button -->
                    <button
                        class="hamburger mr-8"
                        :class="{ 'active': expanded }"
                        @click.stop="expanded = !expanded"
                        aria-controls="mobile-nav"
                        :aria-expanded="expanded"
                    >
                        <span class="sr-only">Menu</span>
                        <svg class="w-6 h-6 fill-current text-gray-900 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100 transition duration-150 ease-in-out" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect y="4" width="24" height="2" rx="1" />
                            <rect y="11" width="24" height="2" rx="1" />
                            <rect y="18" width="24" height="2" rx="1" />
                        </svg>
                    </button>

                    <!-- Mobile navigation -->
                    <nav
                        id="mobile-nav"
                        class="fixed top-0 h-screen z-20 left-0 w-full max-w-sm -ml-16 overflow-scroll bg-white dark:bg-gray-900 shadow-lg no-scrollbar"
                        @click.outside="expanded = false"
                        @keydown.escape.window="expanded = false"
                        x-show="expanded"
                        x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-out duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-cloak
                    >
                        <div class="py-6 pr-4 pl-20">
                            <!-- Site branding -->    
                            <div class="mb-4 shrink-0 bg-black hover:bg-gray-500 btn-sm rounded-none mr-10 md:hidden">
                                <a href="{{ route('home') }}">
                                    <i class="fa-solid fa-folder-open text-white"></i>
                                </a>
                            </div>
                            <!-- Links -->
                            <ul>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="#design">/ Graphic Design</a>
                                </li>
                                <li class="ml-4">
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="{{ route('covers.index') }}">-> Covers</a>
                                </li>
                                <li class="ml-4">
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="{{ route('layouts.index') }}">-> Layouts</a>
                                </li>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="#development">/ Web Development</a>
                                </li>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="#blasts">/ Email Marketing</a>
                                </li>
                                
                                <li>
                                <a class="font-bold btn-sm text-white bg-black hover:bg-gray-700 mt-3 mb-6 rounded-none" href="{{ route('message.send') }}">Contact</a>
                            </li>

                            @if (session('admin_logged_in'))

                            <li>
                                <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="{{ route('admin.login') }}">/ Admin</a>
                            </li>

                            <li class="ml-4">
                                <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="{{ route('admin.projects.index') }}">-> Projects</a>
                            </li>

                            <li class="ml-4">
                                <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="{{ route('messages.index') }}">-> Messages</a>
                            </li>

                            <li class="ml-4">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2 w-full text-left"
                                    >
                                        X Logout
                                    </button>
                                </form>
                            </li>

                            @endif

                            </ul>
                            
                            
                        
                        </div>
                    </nav>

                </div>

            
        </div>
    </header>

    <!-- Page content -->
    <main class="grow">

    {{ $slot }}

    </main>

    <!-- Site footer -->
    <x-footer /> 

    

    <!-- JS handled through Vite -->

    <!-- Smooth scroll to anchor on page load -->
    <script>
        window.addEventListener("load", function () {
            if (window.location.hash) {
                const el = document.querySelector(window.location.hash);

                if (el) {
                    window.scrollTo(0, 0);

                    setTimeout(() => {
                        el.scrollIntoView({ behavior: "smooth", block: "start" });
                    }, 150);
                }
            }
        });
    </script>
</body>

</html>