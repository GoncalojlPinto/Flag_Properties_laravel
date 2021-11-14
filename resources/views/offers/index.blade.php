<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas as Ofertas') }}
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


    <table class="table table-striped table-bordered bg-gray-50">
        <thead>
            <tr>
                <td>{{ __('ID da oferta') }}</td>
                <td>{{ __('ID do Utilizador') }}</td>
                <td>{{ __('ID da Propriedade') }}</td>
                <td>{{ __('Valor') }}</td>
                <td>{{ __('Estado') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
            <tr>
                <td>{{ $offer->id }}</td>
                <td>{{ $offer->user_id }}</td>
                <td><a href= "http://127.0.0.1:8007/properties/{{ $offer->property_id }}">{{ $offer->property_id }}</a></td>
                <td>{{ $offer->offer }}</td>
                <td>{{ $offer->estado }}</td>

                </tr>
            @endforeach
        </tbody>
</x-app-layout>
