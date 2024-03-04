<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <form action="{{ route('organizer.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
                </div>
                <div class="form-group">
                    <label for="available_seats">Available Seats</label>
                    <input type="number" name="available_seats" id="available_seats" class="form-control" value="{{ $event->available_seats }}" required>
                </div>
                <!-- You can add more fields as needed -->
                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>
</x-app-layout>
