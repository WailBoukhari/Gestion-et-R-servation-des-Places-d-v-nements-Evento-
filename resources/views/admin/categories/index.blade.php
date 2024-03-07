<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Categories Management') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-900 dark:bg-gray-800 py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold mb-6 text-white dark:text-gray-300">{{ __('All Categories') }}</h1>
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('admin.categories.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-white hover:text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">
                    {{ __('Create Category') }}
                </a>
            </div>
            <div class="bg-gray-800 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full divide-y divide-gray-700 dark:divide-gray-600">
                    <thead class="bg-gray-700 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 dark:bg-gray-800 divide-y divide-gray-700 dark:divide-gray-600">
                        @foreach ($categories as $category)
                            <tr class="transition-colors duration-300 hover:bg-gray-700 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-200 dark:text-gray-300">{{ $category->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center">
                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white hover:text-white font-semibold py-1 px-3 rounded transition duration-300 ease-in-out">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white hover:text-white font-semibold py-1 px-3 rounded transition duration-300 ease-in-out ml-2">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
