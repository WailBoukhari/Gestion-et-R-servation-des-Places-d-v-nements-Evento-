<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <a href="{{ route('organizer.events.create') }}" class="btn btn-primary mb-3">Create Event</a>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="dark:text-white">Title</th>
                                <th class="dark:text-white">Description</th>
                                <th class="dark:text-white">Start Time</th>
                                <th class="dark:text-white">End Time</th>
                                <th class="dark:text-white">Location</th>
                                <th class="dark:text-white">Available Seats</th>
                                <th class="dark:text-white">Category</th>
                                <th class="dark:text-white">Accepted</th>
                                <th class="dark:text-white">Validated</th>
                                <th class="dark:text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($events as $event)
                                <tr>
                                    <td class="dark:text-white">{{ $event->title }}</td>
                                    <td class="dark:text-white">{{ $event->description }}</td>
                                    <td class="dark:text-white">{{ $event->start_time }}</td>
                                    <td class="dark:text-white">{{ $event->end_time }}</td>
                                    <td class="dark:text-white">{{ $event->location }}</td>
                                    <td class="dark:text-white">{{ $event->available_seats }}</td>
                                    <td class="dark:text-white">{{ $event->category->name }}</td>
                                    <td class="dark:text-white">
                                        @if ($event->auto_accept_reservation)
                                            <p class="text-green-600 dark:text-green-400">Auto Reservation</p>
                                        @else
                                            <p class="text-red-600 dark:text-red-400">Manual Reservation</p>
                                        @endif
                                    </td>
                                    <td class="dark:text-white">{{ $event->validated ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('organizer.events.edit', $event) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('organizer.events.destroy', $event) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
