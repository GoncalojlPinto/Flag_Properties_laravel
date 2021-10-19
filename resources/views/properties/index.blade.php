<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Imovéis') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a class='inline-flex hover:no-underline items-center px-4 py-2 bg-yellow-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-600 disabled:opacity-25 transition ease-in-out duration-150 no-underline p-3 m-3' href="{{ route('properties.create') }}" title="{{ __('Inserir novo Imóvel')}}"> {{ __('Inserir Novo Imóvel')}}
    </a>

    <table class="table table-striped table-bordered bg-white">
        <thead>
            <tr>
                <td>{{ __('Descrição') }}</td>
                <td>{{ __('Andar') }}</td>
                <td>{{ __('Tipologia') }}</td>
                <td>{{ __('Quartos') }}</td>
                <td>{{ __('Casas de Banho') }}</td>
                <td>{{ __('Localização') }}</td>
                <td>{{ __('Preço') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->description }}</td>
                    <td>{{ $property->floor ?? $property->type}}</td>
                    <td>{{ $property->type }}</td>
                    <td>{{ $property->bedrooms }}</td>
                    <td>{{ $property->bathrooms }}</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-around">
                            <a class="btn btn-small btn-success" href="{{ route('properties.show', $property->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-small btn-info" href="{{ route('properties.edit', $property->id) }}"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</x-app-layout>
