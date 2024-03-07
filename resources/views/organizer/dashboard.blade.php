<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organizer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Events Count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-lg font-semibold mb-2">{{ __('Events Count') }}</div>
                        <div>{{ __('Number of Events') }}: {{ $organizerEventsCount }}</div>
                    </div>
                </div>

                <!-- Reservations Count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-lg font-semibold mb-2">{{ __('Reservations Count') }}</div>
                        <div>{{ __('Number of Reservations') }}: {{ $organizerReservationsCount }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
