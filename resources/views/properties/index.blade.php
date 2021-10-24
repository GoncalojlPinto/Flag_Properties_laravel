<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Imovéis') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
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
    <a class='inline-flex hover:no-underline items-center px-4 py-2 bg-yellow-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-600 disabled:opacity-25 transition ease-in-out duration-150 no-underline p-3 m-3' href="{{ route('properties.create') }}" title="{{ __('Inserir novo Imóvel')}}"> {{ __('Inserir Novo Imóvel')}}
    </a>



            <div class="container ml-1 mr-2antialiased text-gray-900" id='app'>
                <div class="flex flex-wrap w-full">
                    @foreach ($properties as $property)
                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                    <a href="{{ route('properties.show', $property->id) }}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <div class="relative pb-48 overflow-hidden">
                    <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 ease-in-out transform hover:scale-105" src="{{ $property->photo ? asset("images/".$property->photo) : asset("images/default.jpg") }}" alt="photo">
                    </div>
                    <div class="p-4">
                        <h4 class="mt-2 mb-2  font-bold">{{ $property->description }}</h4>
                        <h5 class="text-sm">{{ $property->location }}</h5>
                    <div class="mt-3 flex items-center">
                        <span class="font-bold text-xl">{{number_format($property->price ,0 , ',' ,'.') }} €</span>&nbsp;<span class="text-sm font-semibold"></span>
                    </div>
                    </div>
                    <div class="p-4 border-t border-b text-xs text-gray-700">
                        <span class="flex items-center mb-1">
                            <i class="fas fa-home mr-2"></i></i> {{ $property->type }}
                            </span>
                        <span class="flex items-center mb-1">
                            <i class="fas fa-bed mr-2"></i> {{ $property->bedrooms }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-bath mr-2"></i> {{ $property->bathrooms }}
                        </span>
                    </div>
                    <div class="d-flex align-items-center space-x-4">
                        <a class="btn btn-info" href="{{ route('properties.edit', $property->id) }}"><i class="fa fa-edit"></i> Editar</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> Apagar</button>
                        </form>
                    </div>
                    </a>
                    <div>
                        @if (Auth::check())
                        <div class="panel-footer">
                            <favorite
                                :post={{ $property->id }}
                                :favorited={{ $property->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                    @endif
                </div>
                    </div>

                    @endforeach
                </div>
            </div>

</x-app-layout>
