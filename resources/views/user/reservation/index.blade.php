<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 dark:text-gray-200 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-800 dark:bg-gray-900">
        <div class="container mx-auto">
            @if ($reservations->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400">{{ __('No pending reservations.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-600 dark:divide-gray-700">
                        <thead class="bg-gray-700 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Event Title
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    User
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Organizer
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-600 dark:bg-gray-900 dark:divide-gray-700">
                            @foreach ($reservations as $reservation)
                                <tr class="dark:bg-gray-700 hover:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        <form action="{{ route('events.reserve', $reservation->event->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="hover:underline focus:outline-none">
                                                {{ $reservation->event->title }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        {{ $reservation->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        {{ $reservation->event->organizer->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $reservation->accepted ? 'bg-green-600 text-green-100' : 'bg-red-600 text-yellow-100' }}">
                                            {{ $reservation->accepted ? 'Accepted' : 'Waiting' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('user.reservations.destroy', $reservation) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white hover:text-white font-semibold py-1 px-3 rounded transition duration-300 ease-in-out ml-2" onclick="return confirm('Are you sure you want to Cancel this reservation?')">Cancel Reservation</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
