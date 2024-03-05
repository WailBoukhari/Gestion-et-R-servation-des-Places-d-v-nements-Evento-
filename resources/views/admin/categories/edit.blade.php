<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-900 dark:bg-gray-800 py-6">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-300 dark:text-gray-400 text-sm font-semibold mb-2">Category
                    Name:</label>
                <input type="text" name="name"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-900 dark:text-gray-100 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" value="{{ $category->name }}" required>
            </div>
            <img src="{{ $category->image_url }}" alt="Category Image">

            <input type="file" name="image">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Submit</button>
        </form>
    </div>
</x-app-layout>
