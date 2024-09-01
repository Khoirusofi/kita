<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admins.galeris.update', $galeri) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image Input -->
                        <div class="mb-6">
                            <label for="img" class="block text-sm font-medium text-gray-700">
                                {{ __('Upload Image') }}
                            </label>
                            <input type="file" name="img" id="img"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0 file:text-sm file:font-semibold
                                   file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @if ($galeri->img)
                                <img src="{{ Storage::url('public/galeri/' . $galeri->img) }}" alt="Image"
                                    class="mt-2 h-24 w-24 object-cover rounded-md">
                            @endif
                            @error('img')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Update Galeri') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
