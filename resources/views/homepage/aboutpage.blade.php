{{-- <x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sobre Nós') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __('Ao entrar no mercado Português, a FlagProperties propôs-se aplicar o modelo de negócio inovador e de sucesso em todo o mundo e com ele alterar a maneira como se vendiam e compravam imóveis e se geria uma agência imobiliária. O desafio era impulsionar mudanças na qualidade do sector – proporcionar um melhor serviço ao cliente, introduzir novos sistemas de gestão e de marketing e profissionalizar os agentes imobiliários.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p> {{ __('Contactos: +351 210 000 000') }}</p>
                    <p>{{ __('Email:') }}<a href="mailto:geral@flagproperties.com">
                            {{ __('geral@flagproperties.com') }}<a></p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout> --}}

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 border-top-5">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl pl-0 ml-0  sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex ml-1 pr-4">

                    <a href="{{url('/')}} "><img src="../../assets/flagImoveis.png" alt="logo" width='70px' height='70px'></a>


                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user() != null ? Auth::user()->name : '' }}</div>
                        </button>
                    </x-slot>



                    <!-- Authentication -->
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user() != null ? Auth::user()->name : '' }}
                </div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user() != null ? Auth::user()->email : '' }}
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Imovéis') }}
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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __('Ao entrar no mercado Português, a FlagProperties propôs-se aplicar o modelo de negócio inovador e de sucesso em todo o mundo e com ele alterar a maneira como se vendiam e compravam imóveis e se geria uma agência imobiliária. O desafio era impulsionar mudanças na qualidade do sector – proporcionar um melhor serviço ao cliente, introduzir novos sistemas de gestão e de marketing e profissionalizar os agentes imobiliários.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p> {{ __('Contactos: +351 210 000 000') }}</p>
                    <p>{{ __('Email:') }}<a href="mailto:geral@flagproperties.com">
                            {{ __('geral@flagproperties.com') }}<a></p>
                </div>

            </div>
        </div>
    </div>

</x-guest-layout>

