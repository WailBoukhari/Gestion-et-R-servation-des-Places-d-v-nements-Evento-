<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-900 dark:bg-gray-800 py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold mb-4 text-white dark:text-gray-300">{{ __('All Users') }}</h1>
            <div class="bg-gray-800 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full divide-y divide-gray-700 dark:divide-gray-600">
                    <thead class="bg-gray-700 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Email') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Role') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 dark:bg-gray-800 divide-y divide-gray-700 dark:divide-gray-600">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-200 dark:text-gray-300">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-200 dark:text-gray-300">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($user->roles as $role)
                                        <span
                                            class="px-2 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-500 text-white">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if ($user->is_suspended)
                                        <form action="{{ route('admin.users.activate', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Activate</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.users.suspend', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Suspend</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
