<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admins.contents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="title1"
                                    class="block text-sm font-medium text-gray-700">{{ __('Title 1') }}</label>
                                <input type="text" name="title1" id="title1" value="{{ old('title1') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                                @error('title1')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="title2"
                                    class="block text-sm font-medium text-gray-700">{{ __('Title 2') }}</label>
                                <input type="text" name="title2" id="title2" value="{{ old('title2') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                                @error('title2')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Place and Date Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="place"
                                    class="block text-sm font-medium text-gray-700">{{ __('Place') }}</label>
                                <input type="text" name="place" id="place" value="{{ old('place') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                                @error('place')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="tgl"
                                    class="block text-sm font-medium text-gray-700">{{ __('Date') }}</label>
                                <input type="date" name="tgl" id="tgl" value="{{ old('tgl') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                                @error('tgl')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
                            @foreach (['img1', 'img2', 'img3', 'img4'] as $imageField)
                                <div>
                                    <label for="{{ $imageField }}" class="block text-sm font-medium text-gray-700">
                                        {{ __('Upload Image') }} {{ substr($imageField, -1) }}
                                    </label>
                                    <input type="file" name="{{ $imageField }}" id="{{ $imageField }}"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                           file:rounded-md file:border-0 file:text-sm file:font-semibold
                                           file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    @error($imageField)
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Save Content') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
