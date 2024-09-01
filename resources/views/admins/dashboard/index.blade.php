<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-center">
                    <!-- Container for centering the image -->
                    <div class="mb-4 flex justify-center">
                        <img src="{{ asset('img/icon.png') }}" alt="Logo" class="w-48 h-auto rounded-lg" />
                    </div>
                    <h1 class="text-2xl font-semibold text-pink-900 mb-4">{{ __('Welcome Back, My Love!') }}</h1>
                    <p class="text-pink-600 mb-6">
                        {{ __('I’m so happy to see you here. Everything is ready for us to enjoy together. Let’s make the most of it and create beautiful memories.') }}
                    </p>
                    {{-- <a href="#"
                        class="inline-block px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">Let’s
                        Explore Together</a> --}}
                </div>
            </div>
        </div>
    </div>




</x-admin-layout>
