@extends('layouts.app')

@section('title', 'Settings - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
            <p class="mt-2 text-sm text-gray-700">Manage your preferences and account settings</p>
        </div>

        <!-- Settings Sections -->
        <div class="space-y-6">
            <!-- General Settings -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">General</h2>
                    <p class="text-sm text-gray-600 mt-1">Basic information and preferences</p>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Name</label>
                        <input type="text" value="John Doe" disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm text-gray-500 cursor-not-allowed"
                            placeholder="Your display name">
                        <p class="mt-1 text-xs text-gray-500">This name will be displayed throughout the app</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" value="john.doe@university.edu" disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm text-gray-500 cursor-not-allowed"
                            placeholder="your@email.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Time Zone</label>
                        <select disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm text-gray-500 cursor-not-allowed">
                            <option>Asia/Jakarta (GMT+7)</option>
                            <option>Asia/Singapore (GMT+8)</option>
                            <option>UTC</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Week Start</label>
                        <select disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm text-gray-500 cursor-not-allowed">
                            <option>Monday</option>
                            <option>Sunday</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-500">First day of the week in calendar views</p>
                    </div>
                </div>
            </div>

            <!-- Appearance -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Appearance</h2>
                    <p class="text-sm text-gray-600 mt-1">Customize how MyKuliah looks</p>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Theme</label>
                        <div class="grid grid-cols-3 gap-4">
                            <button
                                class="flex flex-col items-center p-4 rounded-lg border-2 border-primary-600 bg-primary-50 hover:bg-primary-100 transition-colors">
                                <svg class="h-8 w-8 text-primary-600 mb-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-900">Light</span>
                            </button>
                            <button
                                class="flex flex-col items-center p-4 rounded-lg border-2 border-gray-300 bg-gray-50 hover:bg-gray-100 transition-colors opacity-50 cursor-not-allowed">
                                <svg class="h-8 w-8 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-900">Dark</span>
                            </button>
                            <button
                                class="flex flex-col items-center p-4 rounded-lg border-2 border-gray-300 bg-gray-50 hover:bg-gray-100 transition-colors opacity-50 cursor-not-allowed">
                                <svg class="h-8 w-8 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-900">Auto</span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Accent Color</label>
                        <div class="flex gap-3">
                            <button class="h-10 w-10 rounded-lg bg-blue-600 ring-2 ring-blue-600 ring-offset-2"></button>
                            <button class="h-10 w-10 rounded-lg bg-purple-600 opacity-50 cursor-not-allowed"></button>
                            <button class="h-10 w-10 rounded-lg bg-pink-600 opacity-50 cursor-not-allowed"></button>
                            <button class="h-10 w-10 rounded-lg bg-green-600 opacity-50 cursor-not-allowed"></button>
                            <button class="h-10 w-10 rounded-lg bg-red-600 opacity-50 cursor-not-allowed"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Notifications</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage your notification preferences</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between py-3">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900">Task Reminders</h3>
                            <p class="text-sm text-gray-500">Get notified about upcoming tasks</p>
                        </div>
                        <button type="button"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-primary-600 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2"
                            role="switch" aria-checked="true">
                            <span
                                class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>

                    <div class="flex items-center justify-between py-3 border-t border-gray-200">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900">Exam Alerts</h3>
                            <p class="text-sm text-gray-500">Receive alerts for upcoming exams</p>
                        </div>
                        <button type="button"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-primary-600 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2"
                            role="switch" aria-checked="true">
                            <span
                                class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>

                    <div class="flex items-center justify-between py-3 border-t border-gray-200">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900">Class Notifications</h3>
                            <p class="text-sm text-gray-500">Get notified before classes start</p>
                        </div>
                        <button type="button"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2"
                            role="switch" aria-checked="false">
                            <span
                                class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>

                    <div class="flex items-center justify-between py-3 border-t border-gray-200">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900">Email Notifications</h3>
                            <p class="text-sm text-gray-500">Receive notifications via email</p>
                        </div>
                        <button type="button"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2"
                            role="switch" aria-checked="false">
                            <span
                                class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Data & Privacy -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Data & Privacy</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage your data and privacy settings</p>
                </div>
                <div class="p-6 space-y-4">
                    <button
                        class="w-full flex items-center justify-between p-4 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <div class="text-left">
                                <h3 class="text-sm font-medium text-gray-900">Export Data</h3>
                                <p class="text-xs text-gray-500">Download all your data</p>
                            </div>
                        </div>
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <button
                        class="w-full flex items-center justify-between p-4 rounded-lg border border-red-200 hover:bg-red-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <div class="text-left">
                                <h3 class="text-sm font-medium text-red-900">Delete Account</h3>
                                <p class="text-xs text-red-600">Permanently delete your account</p>
                            </div>
                        </div>
                        <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- About -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">About</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Version</span>
                        <span class="text-sm font-medium text-gray-900">1.0.0</span>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <span class="text-sm text-gray-600">Developer</span>
                        <span class="text-sm font-medium text-gray-900">MyKuliah Team</span>
                    </div>
                    <div class="pt-4 border-t border-gray-200 space-y-2">
                        <a href="#" class="block text-sm text-primary-600 hover:text-primary-700">Terms of
                            Service</a>
                        <a href="#" class="block text-sm text-primary-600 hover:text-primary-700">Privacy Policy</a>
                        <a href="#" class="block text-sm text-primary-600 hover:text-primary-700">Help & Support</a>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end gap-3 pb-8">
                <button
                    class="px-6 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button disabled
                    class="px-6 py-2 text-sm font-medium text-white bg-gray-400 rounded-lg cursor-not-allowed">
                    Save Changes (UI Only)
                </button>
            </div>
        </div>
    </div>
@endsection
