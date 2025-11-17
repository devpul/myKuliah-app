@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative z-10 bg-white/10 backdrop-blur-lg p-10 rounded-2xl shadow-2xl w-full max-w-lg border border-white/20">
        @if(session('success'))
            <div class="mb-5">
                <div class="flex items-center justify-between px-4 py-3 rounded-lg bg-green-500/20 backdrop-blur-md border border-green-400/30 text-green-200 shadow-lg animate-fade-in-down">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>

                    <button onclick="this.parentElement.parentElement.remove()"
                        class="text-green-200 hover:text-green-300 transition">
                        X
                    </button>
                </div>
            </div>
        @endif

        <!-- Header with Logo/Icon -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white">Sistem Manajemen Perkuliahan</h1>
            <p class="text-gray-300 mt-2">Kelola jadwal, tugas, dan progress Anda dengan mudah</p>
        </div>
        
        <!-- Tab Toggle -->
        <div class="flex mb-6 bg-white/20 rounded-lg p-1">
            <button id="login-tab" class="flex-1 py-2 px-4 text-center text-white font-medium rounded-md transition-all duration-300 {{ request()->is('login') ? 'bg-white/30 shadow-md' : 'hover:bg-white/10' }}">Login</button>
            <button id="register-tab" class="flex-1 py-2 px-4 text-center text-white font-medium rounded-md transition-all duration-300 {{ request()->is('register') ? 'bg-white/30 shadow-md' : 'hover:bg-white/10' }}">Register</button>
        </div>

        
        <!-- Login Form -->
        <div id="login-form" class="transition-opacity duration-500 {{ request()->is('login') ? 'opacity-100' : 'opacity-0 hidden' }}">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-white mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 pl-12 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300">
                        <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    @error('email') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-white mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 pl-12 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300">
                        <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    @error('password') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-300 shadow-lg">
                    Sign In
                </button>
            </form>
            
            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-white/30"></div>
                <span class="px-3 text-gray-400 text-sm">or</span>
                <div class="flex-1 border-t border-white/30"></div>
            </div>
            
            <!-- Google Login -->
            <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center bg-white/20 border border-white/30 text-white py-3 px-4 rounded-lg hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300 shadow-lg">
                <svg class="w-6 h-6 mr-3" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Continue with Google
            </a>
        </div>
        
        <!-- Register Form -->
        <div id="register-form" class="transition-opacity duration-500 {{ request()->is('register') ? 'opacity-100' : 'opacity-0 hidden' }}">
            <form method="POST" action="{{ route('store_register') }}">
                @csrf
                <div class="mb-6">
                    <label for="nomor_mahasiswa" class="block text-sm font-semibold text-white mb-2">Nomor Induk Mahasiswa</label>
                    <input type="text" id="nomor_mahasiswa" name="nomor_mahasiswa" value="{{ old('nomor_mahasiswa') }}" required
                           class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-300">
                    @error('nomor_mahasiswa') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-white mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('nama') }}" required
                           class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-300">
                    @error('nama') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-white mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-300">
                    @error('email') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-white mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-300">
                    @error('password') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-green-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition-all duration-300 shadow-lg">
                    Create Account
                </button>
            </form>
        </div>
        
        <!-- Footer Link -->
        <p class="mt-6 text-center text-sm text-gray-400">
            {{ request()->is('login') ? 'Don\'t have an account?' : 'Already have an account?' }}
            <a href="{{ request()->is('login') ? route('register') : route('login') }}" class="text-blue-400 hover:underline transition-colors duration-300"> {{ request()->is('login') ? 'Sign up' : 'Sign in' }} </a>
        </p>
    </div>
</div>

<script>
    // Simple tab toggle with JavaScript
    document.getElementById('login-tab').addEventListener('click', function() {
        document.getElementById('login-form').classList.remove('hidden');
        document.getElementById('login-form').classList.add('opacity-100');
        document.getElementById('register-form').classList.add('hidden');
        document.getElementById('register-form').classList.remove('opacity-100');
        this.classList.add('bg-white/30', 'shadow-md');
        document.getElementById('register-tab').classList.remove('bg-white/30', 'shadow-md');
    });
    
    document.getElementById('register-tab').addEventListener('click', function() {
        document.getElementById('register-form').classList.remove('hidden');
        document.getElementById('register-form').classList.add('opacity-100');
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('login-form').classList.remove('opacity-100');
        this.classList.add('bg-white/30', 'shadow-md');
        document.getElementById('login-tab').classList.remove('bg-white/30', 'shadow-md');
    });
</script>
@endsection