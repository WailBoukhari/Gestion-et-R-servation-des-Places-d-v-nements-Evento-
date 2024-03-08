<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"
        class="max-w-md mx-auto mt-4 p-6 bg-gray-800 rounded-lg shadow-md">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="text"
                name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />

            <x-text-input id="password"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="password"
                name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />

            <x-text-input id="password_confirmation"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mb-4">
            <x-input-label for="role" :value="__('Role')" class="text-gray-300" />
            <select id="role" name="role"
                class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600">
                <option value="user">User</option>
                <option value="organizer">Organizer</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('login') }}"
                class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
