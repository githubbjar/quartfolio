<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Quartfolio: Jerry M. Janquart Design and Development Portfolio' }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="font-inter antialiased text-gray-900 bg-gray-900 tracking-tight">
    
    <!-- Page wrapper -->
    <div class="min-h-screen max-w-[1400px] mx-auto px-6 pt-8">

    <!-- Site header -->
    <header class="absolute w-full z-30 max-w-[1400px] mx-auto px-15">

        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between h-20">

                <!-- Site branding -->
                <div class="shrink-0 bg-black hover:bg-gray-500 btn-sm rounded-none">
                    <!-- Logo -->
                    <a href="{{ route('home') }}"><i class="fa-solid fa-folder-open text-white"></i></a>
                </div>

                <!-- Desktop navigation -->
                <nav class="hidden md:flex md:grow px-6">

                    <!-- Desktop menu links -->
                    <ul class="flex grow flex-wrap items-center font-medium">
                        
                        <li>
                            <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('covers.index') }}">Covers</a>
                        </li>
                        <li>
                            <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('layouts.index') }}">Layouts</a>
                        </li>
                        <li>
                            <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('eblasts.index') }}">Eblasts</a>
                        </li>

                        @if (session('admin_logged_in'))
    
                            <li>
                                <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('projects.index') }}">Projects</a>
                            </li>

                            <li>
                                <a class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('messages.index') }}">Messages</a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="text-black hover:text-gray-600 px-5 py-2 flex items-center transition duration-150 ease-in-out w-full text-left"
                                    >
                                        Logout
                                    </button>
                                </form>
                            </li>

                        @endif
                        

                    </ul>

                    <ul class="flex justify-end flex-wrap items-center pr-2">
                        <li>
                            <a class="font-bold btn-sm text-white bg-black hover:bg-gray-500 ml-6 rounded-none" href="{{ route('message.send') }}">Contact</a>
                        </li>
                    </ul>

                </nav>
                
                <!-- Mobile menu -->
                <div class="inline-flex md:hidden" x-data="{ expanded: false }">

                    <!-- Hamburger button -->
                    <button
                        class="hamburger"
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
                            <!-- Logo -->
                            <i class="fa-solid fa-folder-open"></i>
                            <!-- Links -->
                            <ul>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="about.html">About</a>
                                </li>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="blog.html">FAQ</a>
                                </li>
                                <li>
                                    <a class="flex text-black hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 py-2" href="testimonials.html">Resume</a>
                                </li>
                                <li>
                                <a class="font-bold btn-sm text-white bg-black hover:bg-gray-700 mt-3" href="contact.html">Contact</a>
                            </li>
                            </ul>
                            
                            
                        
                        </div>
                    </nav>

                </div>

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

</body>

</html>