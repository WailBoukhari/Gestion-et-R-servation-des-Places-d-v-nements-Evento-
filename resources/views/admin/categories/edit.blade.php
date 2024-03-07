<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <style>
        input[type="file"] {
            display: none;
        }

        label[for="image"] {
            cursor: pointer;
            background-color: #4a5568;
            color: #cbd5e0;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            display: inline-block;
            margin-top: 0.5rem;
            transition: background-color 0.3s ease;
        }

        label[for="image"]:hover {
            background-color: #2d3748;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 1rem;
        }
    </style>

    <div class="max-w-2xl mx-auto bg-gray-900 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden p-6">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-300 dark:text-gray-400 text-sm font-semibold mb-2">Category Name:</label>
                <input type="text" name="name" class="block w-full rounded-md bg-gray-800 dark:bg-gray-700 border-gray-700 dark:border-gray-600 text-white dark:text-gray-300 px-4 py-2 mt-1 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200" id="name" value="{{ $category->name }}" required>
            </div>
            <label for="image">Upload Category Image:</label>
            <img src="{{ asset( $category->image_url) }}" alt="Category Image">
            <input type="file" name="image" id="image">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out mt-4">Submit</button>
        </form>
    </div>
</x-app-layout>
