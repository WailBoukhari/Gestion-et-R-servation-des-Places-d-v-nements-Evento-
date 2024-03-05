<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <form action="{{ route('organizer.events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" class="form-textarea mt-1 block w-full" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" name="location" id="location" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="available_seats" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Available Seats</label>
                    <input type="number" name="available_seats" id="available_seats" class="form-input mt-1 block w-full" required>
                </div>
                      </div>
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        Reservation Acceptance
    </label>
    <input type="radio" id="auto_accept" name="auto_accept_reservation" value="1" checked>
    <label for="auto_accept">Auto</label>
    <input type="radio" id="manual_accept" name="auto_accept_reservation" value="0">
    <label for="manual_accept">Manual</label>
</div>                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category" id="category" class="form-select mt-1 block w-full" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="file" name="image">

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Event</button>
            </form>
        </div>
    </div>
</x-app-layout>
