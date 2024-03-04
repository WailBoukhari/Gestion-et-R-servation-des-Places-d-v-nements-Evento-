<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Categories Management') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-900 dark:bg-gray-800 py-6">
        <a href="{{ route('admin.categories.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out inline-block mb-2">Add
            Category</a>
        @if ($categories->isEmpty())
            <p class="text-white dark:text-gray-300">No categories found.</p>
        @else
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full divide-y divide-gray-700 dark:divide-gray-600">
                    <thead class="bg-gray-700 dark:bg-gray-600">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 dark:bg-gray-800 divide-y divide-gray-700 dark:divide-gray-600">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200 dark:text-gray-300">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition duration-300 ease-in-out dark:bg-red-800 dark:hover:bg-red-700">Delete</button>
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-300 ease-in-out dark:bg-blue-800 dark:hover:bg-blue-700">Edit</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
