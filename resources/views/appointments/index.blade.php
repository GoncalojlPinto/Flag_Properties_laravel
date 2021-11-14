<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Agendamentos') }}
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
            @foreach ($appointments as $appointment)
                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                    <div class="p-4 c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                        <h5 class="mt-2 mb-2">Hora - {{ $appointment['hour'] }}h</h5>
                        <h5 class="">{{ __('Dia -') }} {{ $appointment['day'] }}</h5>
                        <h5 class="">{{ __('Mês -') }} {{ $appointment['month'] }}</h5>
                        <h5 class="">{{ __('Ano -') }} {{ $appointment['year'] }}</h5>
                        <h5 class=""> {{ __('Estado -') }}
                            @if ($appointment['isAccepted'] === null)
                                {{ __('Pendente') }}
                            @elseif ($appointment['isAccepted'] === true)
                                {{ __('Aceite') }}
                            @else
                                {{ __('Rjeitado') }}
                            @endif
                        </h5>
                    </div>
                    <div class="p-4 border-t border-b text-xs text-gray-700">

                    </div>

                    </a>
                    <a class="btn btn-small btn-info" href="{{ route('appointments.edit', $appointment['_id']) }}"><i
                            class="fa fa-edit"></i></a>
                </div>

            @endforeach
        </div>
    </div>

</x-app-layout>
