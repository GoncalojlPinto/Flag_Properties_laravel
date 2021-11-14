<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proposta de Compra') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mt-3">
            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Valor da Oferta') }}</label>
            <div class="col-md-6">
                <input type="number" id="offer" name="offer"
                    class="form-control @error('offer') is-invalid @enderror" required autofocus>
                @error('offer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="property_id" class="col-md-4 col-form-label text-md-right">{{ __('Imóvel') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="property_id">
                    @foreach ($properties as $property )
                        <option value="{{ $property->id }}">{{ $property->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <input type="hidden" id="user_id" name="user_id" value="user_id"
                class="p-1 form-control @error('user_id') is-invalid @enderror" autofocus>
            @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirmar Oferta') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
