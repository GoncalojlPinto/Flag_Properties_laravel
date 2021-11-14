<x-app-layout>


    @foreach ($users as $user)
        <form method="POST" action="{{ route('admin/users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                <div class="col-md-6">
                    <input type="text" value="{{ $user->name }}" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Morada') }}</label>
                <div class="col-md-6">
                    <input type="text" value="{{ $user->email }}" id="address" name="address"
                        class="form-control @error('address') is-invalid @enderror" required autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>
                <div class="col-md-6">
                    <input type="text" value="phone" id="phone" name="phone"
                        class="form-control @error('phone') is-invalid @enderror" required autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    @endforeach
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
        </div>
    </div>
    </form>
</x-app-layout>
