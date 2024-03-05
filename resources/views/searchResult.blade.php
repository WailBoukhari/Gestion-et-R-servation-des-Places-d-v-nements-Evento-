<!-- resources/views/events/searchResult.blade.php -->

<x-main>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <h3 class="text-lg font-semibold mb-4">{{ __('Search Results for') }}: {{ $query }}</h3>
            <form id="searchForm" action="{{ route('events.searchResult') }}" method="GET" class="mb-4">
                <div class="flex items-center mb-4">
                    <input type="text" name="query" value="{{ $query }}"
                        class="border border-gray-300 rounded-l px-4 py-2 w-full" placeholder="Type to search...">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                        Search
                    </button>
                </div>
                <div class="flex items-center">
                    <label for="category" class="mr-2">Category:</label>
                    <select name="category" id="category" class="border border-gray-300 rounded px-4 py-2">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($selectedCategory == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            @if ($events->isEmpty())
                <p>{{ __('No events found.') }}</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($events as $event)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $event->title }}</h3>
                            <img src="{{ $event->image }}" alt="Event Image">
                            <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $event->description }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Start Time: {{ $event->start_time }}</p>
                            <p class="text-gray-600 dark:text-gray-400">End Time: {{ $event->end_time }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Location: {{ $event->location }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Available Seats: {{ $event->available_seats }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-400">Category: {{ $event->category->name }}</p>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">Organizer: {{ $event->organizer->name }}
                            </p>
                            <!-- Add the reservation button -->
                            <form action="{{ route('events.reserve', $event) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                                    Make Reservation
                                </button>
                            </form>

                            <!-- Show auto/manual reservation info -->
                            @if ($event->auto_accept_reservation)
                                <p class="text-green-600 dark:text-green-400">Auto Reservation</p>
                            @else
                                <p class="text-red-600 dark:text-red-400">Manual Reservation</p>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            @endif
        </div>
    </div>
</x-main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add change event listener to the category select input
        $('#category').on('change', function() {
            // Submit the form when the category selection changes
            $('#searchForm').submit();
        });
    });
</script>
