<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <!-- Sidebar -->
                <nav class="sidebar">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="nav-links">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                            {{ __('Data Ebook') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dataUser')" :active="request()->routeIs('dataUser')">
                            {{ __('Data User') }}
                        </x-nav-link>
                    </div>

                    <!-- Logout Button -->
                    <div class="logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-nav-link>
                        </form>
                    </div>
                </nav>

                <!-- Content -->
                <div class="flex-1">
                    <!-- Page Heading -->
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>

                    <!-- Footer -->
                    <footer class="footer">
                        <div class="text-center text-sm text-gray-500 p-2">
                            <a href="https://mditech.net/?u=lbc">Admin</a>
                        </div>
                    </footer>

                </div>
            </div>
        </div>
    </body>
</html>
