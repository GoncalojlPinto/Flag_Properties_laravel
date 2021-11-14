<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inserir novo Imóvel') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mt-4">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
            <div class="col-md-6">
                <input type="text" id="description" name="description"
                    class="form-control @error('description') is-invalid @enderror" required autofocus>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Localização') }}</label>
            <div class="col-md-6">
                <input type="text" id="location" name="location"
                    class="form-control @error('location') is-invalid @enderror" required autofocus>
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Andar') }}</label>
            <div class="col-md-6">
                <input type="text" id="floor" name="floor" class="form-control @error('floor') is-invalid @enderror"
                    required autofocus>
                @error('floor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="specialty" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="type">
                    @foreach ($typologies as $typology)
                        <option value={{ $typology }}> {{ $typology }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="bedrooms" class="col-md-4 col-form-label text-md-right">{{ __('Quartos') }}</label>
            <div class="col-md-6">
                <input type="number" id="bedrooms" name="bedrooms"
                    class="form-control @error('bedrooms') is-invalid @enderror" required autofocus>
                @error('bedrooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="bedrooms" class="col-md-4 col-form-label text-md-right">{{ __('Casas de Banho') }}</label>
            <div class="col-md-6">
                <input type="number" id="bathrooms" name="bathrooms"
                    class="form-control @error('bathrooms') is-invalid @enderror" required autofocus>
                @error('bathrooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="bedrooms" class="col-md-4 col-form-label text-md-right">{{ __('Preço') }}</label>
            <div class="col-md-6">
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                    required autofocus>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Foto do Imóvel') }}</label>
            <div class="col-md-6">
                <input type="file" id="photo" name="photo" class="p-1 form-control @error('photo') is-invalid @enderror"
                    autofocus>
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <input type="hidden" id="agent_id" name="agent_id" value="agent_id"
                class="p-1 form-control @error('agent_id') is-invalid @enderror" autofocus>
            @error('agent_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Postar Imóvel') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
