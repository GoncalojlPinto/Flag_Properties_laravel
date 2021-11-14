<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedido de Agendamento') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('appointments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="specialty" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="hour">
                    @foreach ($hours as $hour)
                        <option value={{ $hour }}> {{ $hour }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="form-group row">
            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Dia') }}</label>
            <div class="col-md-6">
                <input type="number" min="1" max="31" id="day" name="day"
                    class="form-control @error('day') is-invalid @enderror" required autofocus>
                @error('day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="specialty" class="col-md-4 col-form-label text-md-right">{{ __('Mês') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="month">
                    @foreach ($months as $month)
                        <option value={{ $month }}> {{ $month }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="form-group row">
            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>
            <div class="col-md-6">
                <input type="number" min="{{ now()->year }}" max="2050" id="year" name="year"
                    class="form-control @error('year') is-invalid @enderror" required autofocus>
                @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="agent_id" class="col-md-4 col-form-label text-md-right">{{ __('Imóvel') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="agent_id">
                    @foreach ($properties as $property)
                        <option value={{ $property->agent_id }}> {{ $property->description }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Pedir Agendamento') }}
                </button>
            </div>
        </div>
    </form>

</x-app-layout>
