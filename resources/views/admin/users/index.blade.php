<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilizadores') }}
        </h2>
    </x-slot>

    @if (Session::has('message'))
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
                <td>{{ __('ID') }}</td>
                <td>{{ __('Nome') }}</td>
                <td>{{ __('Email') }}</td>
                <td>{{ __('Papel') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach ($user->getRoleNames() as $role)
                        <td>{{ $role }}</td>
                    @endforeach
                    <td>
                        <div class="d-flex align-items-center justify-content-around">
                            <a class="btn btn-small btn-success" href="{{ route('users.show', $user->id) }}"><i
                                    class="fa fa-eye"></i></a>
                            <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}"><i
                                    class="fa fa-eye"></i></a>
                            <form action="#" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-small btn-danger"><i
                                        class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</x-app-layout>
