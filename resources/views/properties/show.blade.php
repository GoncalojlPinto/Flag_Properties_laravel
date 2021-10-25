<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Imóvel') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ __('Imóvel') }}</div>
                    <div card="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-5" style="text-align: center">
                                <img src="{{ $property->photo ? asset("/storage/images/".$property->photo) : asset("storage/images/default.jpg") }}" />
                            </div>
                            <div class="col-sm-6 col-md-7">
                                <h5><strong> {{ $property->description}}</strong></h5>
                                <hr>
                                <p>
                                    {{ $property->location }}<br>
                                    {{ $property->type }}<br>
                                    {{ $property->floor }}<br>
                                    {{ $property->bedrooms }}<br>
                                    {{ $property->bathrooms }}<br>
                                </p>
                                <h5>{{ $property->price }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-right">

                  <a href="{{ route('properties.index') }}" class="btn btn-small btn-primary mt-3 w-24">{{ __('Voltar') }}</a>

            </div>
            </div>
        </div>
</div>
</x-app-layout>
