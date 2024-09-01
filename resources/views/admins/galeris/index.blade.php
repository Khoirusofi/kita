<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeri') }}
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
                        <a href="{{ route('admins.galeris.create') }}">
                            {{ __('Add New Gallery') }}
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
                                        {{ __('Image') }}
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($galeris as $galeri)
                                    <tr class="hover:bg-gray-100 transition duration-150">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($galeri->img)
                                                <img src="{{ Storage::url('public/galeri/' . $galeri->img) }}"
                                                    alt="Image" class="h-24 w-24 object-cover rounded-md border">
                                            @else
                                                {{ __('No image') }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admins.galeris.edit', $galeri) }}"
                                                class="text-pink-600 font-bold hover:text-pink-900">
                                                {{ __('Edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-4 text-center text-sm text-gray-500">
                                            {{ __('No galleries found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="mt-6">
                        {{ $galeris->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
