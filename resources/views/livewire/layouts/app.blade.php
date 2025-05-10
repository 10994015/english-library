<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '詞彙學習系統' }}</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-slate-50 min-h-screen">
    <!-- 頂部導航欄 -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto">
            <!-- 移動端選單按鈕 -->
            <div x-data="{ mobileMenuOpen: false }" class="relative">
                <!-- 桌面導航 -->
                <div class="flex justify-between items-center py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center">
                        <a href="{{ route('vocabulary.index') }}" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h1 class="ml-2 text-2xl font-bold text-slate-800">
                                {{ $header ?? '詞彙學習中心' }}
                            </h1>
                        </a>
                    </div>

                    <!-- 桌面導航選項 -->
                    <div class="hidden sm:flex items-center space-x-2">
                        <a href="{{ route('vocabulary.index') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('vocabulary.index') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                詞彙列表
                            </div>
                        </a>
                        <a href="{{ route('vocabulary.create') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('vocabulary.create') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                新增詞彙
                            </div>
                        </a>
                        <a href="{{ route('exam') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('exam') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                測驗中心
                            </div>
                        </a>
                    </div>

                    <!-- 用戶選單 -->
                    <div class="flex items-center">
                        @guest
                            <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800 transition-colors mr-2">登入</a>
                            <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">註冊</a>
                        @else
                            <div x-data="{ userMenuOpen: false }" class="relative">
                                <button @click="userMenuOpen = !userMenuOpen" type="button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span class="sr-only">開啟用戶選單</span>
                                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-medium">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                </button>

                                <div x-show="userMenuOpen"
                                     @click.away="userMenuOpen = false"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                                    <div class="px-4 py-2 text-xs text-slate-500">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">個人資料</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                            登出
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endguest

                        <!-- 移動端選單按鈕 -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="sm:hidden ml-3 text-slate-500 hover:text-slate-700">
                            <span class="sr-only">開啟選單</span>
                            <svg class="h-6 w-6" x-bind:class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-bind:class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- 移動端選單 -->
                <div x-show="mobileMenuOpen"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="sm:hidden bg-white border-t border-slate-200">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="{{ route('vocabulary.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('vocabulary.index') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                詞彙列表
                            </div>
                        </a>
                        <a href="{{ route('vocabulary.create') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('vocabulary.create') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                新增詞彙
                            </div>
                        </a>
                        <a href="{{ route('exam') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('exam') ? 'bg-blue-100 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800' }}">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                測驗中心
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <!-- Livewire Scripts -->
    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @stack('scripts')
</body>
</html>
