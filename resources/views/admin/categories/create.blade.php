<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <style>
        #drop-area {
            border: 2px dashed #4a5568;
            background-color: #2d3748;
            color: #cbd5e0;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
        }

        #drop-area.hover {
            border-color: #4299e1;
            background-color: #4c51bf;
        }

        #drop-area input[type="file"] {
            display: none;
        }

        #preview {
            max-width: 100%;
            max-height: 300px;
            margin-top: 1rem;
        }
    </style>

    <div class="max-w-2xl mx-auto bg-gray-900 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="text-white dark:text-gray-300">Category Name:</label>
                    <input type="text" name="name" id="name" class="block w-full rounded-md bg-gray-800 dark:bg-gray-700 border-gray-700 dark:border-gray-600 text-white dark:text-gray-300 px-4 py-2 mt-1 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>
                <div id="drop-area" class="mb-4">
                    <label for="image" class="text-white dark:text-gray-300">Drag & Drop or Click to Upload Category Image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <div id="preview"></div>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
