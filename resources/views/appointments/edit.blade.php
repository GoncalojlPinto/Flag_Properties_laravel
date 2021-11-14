<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estado') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('appointments.update', $appointment->getId()) }}"
        enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group row mt-4 pt-5">
            <label for="specialty"
                class="col-md-4 col-form-label text-md-right">{{ __('Estado do Agendamento') }}</label>
            <div class="col-md-6">
                <select class="custom-select" name="isAccepted">
                    <option value="true">{{__('Confirmar') }}</option>
                    <option value="false">{{__('Rejeitar') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <input type="hidden" id="hour" name="hour" value="{{ $appointment->getHour() }}"
                class="form-control @error('location') is-invalid @enderror" required autofocus>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <input type="hidden" id="day" name="day" value="{{ $appointment->getDay() }}"
                class="form-control @error('location') is-invalid @enderror" required autofocus>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <input type="hidden" id="month" name="mouth" value="{{ $appointment->getMonth() }}"
                class="form-control @error('location') is-invalid @enderror" required autofocus>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <input type="hidden" id="year" name="year" value="{{ $appointment->getYear() }}"
                class="form-control @error('location') is-invalid @enderror" required autofocus>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <input type="hidden" id="agent_id" name="agent_id" value="{{ auth()->user()->id }}"
                class="form-control @error('location') is-invalid @enderror" required autofocus>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirmar') }}
                </button>
            </div>
        </div>
    </form>

</x-app-layout>
