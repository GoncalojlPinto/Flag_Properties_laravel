<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Os meus favoritos') }}
        </h2>
    </x-slot>

    @if (Session::has('message'))
        <div class="alert alert-success mt-2">{{ Session::get('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="container ml-1 mr-2antialiased text-gray-900" id='app'>
        <div class="flex flex-wrap w-full">

            @forelse ($favorites as $favorite)
                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                    <a href="{{ route('properties.show', $favorite->id) }}"
                        class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out transform hover:scale-105"
                                src="{{ $favorite->photo ? asset('/storage/images/' . $favorite->photo) : asset('storage/images/default.jpg') }}"
                                alt="photo">
                        </div>
                        <div class="p-4">
                            <h4 class="mt-2 mb-2  font-bold">{{ $favorite->description }}</h4>
                            <h5 class="text-sm">{{ $favorite->location }}</h5>
                            <div class="mt-3 flex items-center">
                                <span class="font-bold text-xl">{{ number_format($favorite->price, 0, ',', '.') }}
                                    €</span>
                            </div>
                        </div>
                        <div class="p-4 border-t border-b text-xs text-gray-700">
                            <span class="flex items-center mb-1">
                                <i class="fas fa-home mr-2"></i></i> {{ $favorite->type }}
                            </span>
                            <span class="flex items-center mb-1">
                                <i class="fas fa-bed mr-2"></i> {{ $favorite->bedrooms }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-bath mr-2"></i> {{ $favorite->bathrooms }}
                            </span>
                        </div>
                    </a>
                </div>

            @empty

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5 content-center">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                {{ __('A sua lista de favoritos encontra-se vazia.') }}
                            </div>
                        </div>
                    </div>



            @endforelse

        </div>
    </div>

</x-app-layout>
