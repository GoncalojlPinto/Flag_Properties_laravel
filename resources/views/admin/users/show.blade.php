<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ __('Utilizador') }}</div>
                    <div card="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-7">
                                <h4><strong> {{ $user }}</strong></h4>
                                <hr>
                                <p>
                                    {{ $user->email }}<br>
                                    {{ $user->getRoleNames() }}<br>
                                    {{ $user }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
