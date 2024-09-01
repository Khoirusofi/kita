<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Musik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Pesan sukses jika ada -->
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <x-primary-button class="flex justify-end mb-4">
                        <a href="{{ route('admins.musiks.create') }}">
                            {{ __('Add New Music') }}
                        </a>
                    </x-primary-button>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('No') }}
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('Title') }}
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('Artist') }}
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('Preview') }}
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($musiks as $musik)
                                    <tr class="hover:bg-gray-100 transition duration-150">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $musik->title }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $musik->artist }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($musik->file_path)
                                                <audio controls class="w-32">
                                                    <source
                                                        src="{{ Storage::url('public/musik/' . $musik->file_path) }}"
                                                        type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            @else
                                                {{ __('No preview available') }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admins.musiks.edit', $musik) }}"
                                                class="text-pink-600 font-bold hover:text-pink-900">
                                                {{ __('Edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500">
                                            {{ __('No music found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="mt-6">
                        {{ $musiks->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
