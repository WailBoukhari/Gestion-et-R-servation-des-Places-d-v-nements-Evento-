<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-300 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-900 dark:bg-gray-800 py-6">
       <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>