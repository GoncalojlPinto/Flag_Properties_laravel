
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilizadores') }}
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
                <td>{{ __('Descrição') }}</td>
                <td>{{ __('Localização') }}</td>
                <td>{{ __('Preço') }}</td>
                <td>{{ __('Estado') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
    <tr>
        <td>{{ $offer->description }}</td>
        <td>{{ $offer->location }}</td>
        <td>{{ $offer->price }}</td>
        <td>{{ $offer->estado }} </td>

    </tr>
@endforeach
        </tbody>
</x-app-layout>
