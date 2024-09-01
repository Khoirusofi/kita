<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Musik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admins.musiks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title Input -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Artist Input -->
                        <div class="mb-6">
                            <label for="artist" class="block text-sm font-medium text-gray-700">
                                {{ __('Artist') }}
                            </label>
                            <input type="text" name="artist" id="artist"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            @error('artist')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Music File Input -->
                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-gray-700">
                                {{ __('Upload Music File') }}
                            </label>
                            <input type="file" name="file" id="file"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0 file:text-sm file:font-semibold
                                   file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                required>
                            @error('file')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Save Musik') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
