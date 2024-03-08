<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto mt-4 p-6 bg-gray-800 rounded-lg shadow-md">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="email"
                name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />

            <x-text-input id="password"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mb-4">
            <label for="remember_me" class="inline-flex items-center text-gray-300">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>

            <a href="{{ route('password.request') }}"
                class="text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Forgot your password?') }}
            </a>
        </div>

    </form>
    <!-- Google Registration Button -->
    <div class="mt-4">
        <form action="{{ route('google.redirect') }}" method="GET">
            @csrf
            <button type="submit"
                class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-600 dark:hover:bg-blue-700">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 12h-4v4h-2v-4H7v-2h4V8h2v4h4v2z"
                        clip-rule="evenodd" />
                </svg>{{ __('Login with Google') }}
            </button>
        </form>
    </div>
</x-guest-layout>
